<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {

        $categories = Category::latest()->paginate(3);
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(CategoryRequest $request)
    {
        $validation=$request->validated();
        try {
            // $category = Category::create($request->validated());
            $this->categoryService->create($validation);
            return redirect()->route('category.index')->with('success', 'Category created successfully');
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e,
            ]);
        }
    }

    public function updateStatus(Request $request, Category $category)
    {


        $validation = $request->validate([
            'status' => 'required|in:active,inactive',
        ]);
         $this->categoryService->updateStatus($validation['status'],$category);

        return response()->json([
            'success' => true,
            'message' => 'status updated successfully',
        ]);
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
     {

        $validation=$request->validated();
        $this->categoryService->update($validation,$category);
        return redirect()->route('category.index')->with('success',"category updated successfully");
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')->with('success','category deleted successfully');
    }
}
