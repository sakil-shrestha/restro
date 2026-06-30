<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TableResource;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function index()
    {
        $tables=Table::all();
        return TableResource::collection($tables);

    }

    public function updateStatus(Request $request)
    {
        $table=Table::findOrFail($request->table_id);
        $table->update([
            'status'=>'occupied',
        ]);
        return response()->json([
            'status'=>true,
            'message'=>"Table Booked Successfully",
        ]);
    }
}
