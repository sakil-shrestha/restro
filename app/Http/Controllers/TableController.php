<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTableRequest;
use App\Services\TableService;
use Exception;
use Illuminate\Http\Request;

class TableController extends Controller
{
    protected $tableService;
    public function __construct(TableService $tableService)
    {
        $this->tableService=$tableService;
    }
    public function store(StoreTableRequest $request)
    {
        try{

            $table=$this->tableService->create($request->validated());
            return response()->json([
                'message'=>"Table created Successfully",
                'data'=>$table,
            ]);
        }
        catch(Exception $e)
        {
            return response()->json([
                'message'=>$e,
            ],422);
        }

    }
}
