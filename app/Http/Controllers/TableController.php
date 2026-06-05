<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTableRequest;
use App\Models\Table;
use App\Services\TableService;
use Exception;
use Illuminate\Http\Request;

class TableController extends Controller
{
    protected $tableService;

    public function __construct(TableService $tableService)
    {
        $this->tableService = $tableService;
    }

    public function index()
    {
        $tables = Table::latest()->paginate(3);
        return view('table.index', compact('tables'));
    }

    public function create()
    {
        return view('table.create');
    }
    public function store(StoreTableRequest $request)
    {

        try {

            $table = $this->tableService->create($request->validated());

            return redirect()->route('table.index');

            // return response()->json([
            //     'message'=>"Table created Successfully",
            //     'data'=>$table,
            // ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e,
            ], 422);
        }
    }

    public function edit(Table $table)
    {

        // $table=Table::find($id);
        return view('table.edit', compact('table'));
    }

    public function update(StoreTableRequest $request, Table $table)
    {

        $table->update($request->validated());
        return redirect()->route('table.index')->with('suceess', "Table Updated Successfully");
    }
    public function destroy(Table $table)
    {

        // using TableService
        $this->tableService->delete($table);

        // $table->delete();
        return redirect()->back()->with('success', "Table Deleted Successfully");
    }

    public function updateStatus(Request $request, Table $table)
    {
        $validation=$request->validate([
            'status' => 'required|in:available,occupied,reserved',
        ]);
        $this->tableService->updateStatus($validation['status'],$table);
        // $table->update([
        //     'status' => $request->status,
        // ]);
        return response()->json([
            'success' => true,
            'message' => "Table status updated successfully",
        ]);
    }
}
