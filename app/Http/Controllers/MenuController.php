<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuRequest;
use App\Models\Category;
use App\Models\MenuItem;
use App\Services\MenuService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    protected $menuService;
    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function index()
    {
        $menus = MenuItem::with('category')->paginate(5);

        return view('menu.index', compact('menus'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('menu.create', compact('categories'));
    }

    public function store(MenuRequest $request)
    {

        try {

        $this->menuService->create($request->validated(),$request->file('image'));
            return redirect()->route('menu.index')->with('success', 'Menu Items saved successfully');
        } catch (Exception $e) {
          return redirect()->back()->withInput()->withErrors([
            'error'=>'Something went wrong. Please try again later',
          ]);
        }
    }

    public function updateStatus(Request $request, MenuItem $menu)
    {
        $validation = $request->validate([
            'is_available' => 'required|boolean',
        ]);
        $menu->update([
            'is_available' => $validation['is_available'],
        ]);
        return response()->json([
            'success' => true,
            'message' => 'status updated successfully',
        ]);
    }

    public function edit(MenuItem $menu)
    {
        $categories = Category::all();
        return view('menu.edit', compact('menu', 'categories'));
    }

    public function update(MenuRequest $request, MenuItem $menu)
    {

        try {

            $this->menuService->update($menu, $request->validated(), $request->file('image'));
            return redirect()->route('menu.index')->with('success', 'Menu items Updated Successfully');
        } catch (Exception $e) {
            return redirect()->back()->withInput()->withErrors([
                'error' => 'Something went wrong. Please try again',
            ]);
        }
    }

    public function destroy(MenuItem $menu)
    {
        $menu->delete();
        return redirect()->back()->with([
            'success' => true,
            'message' => 'menu items deleted successfully',
        ]);
    }
}
