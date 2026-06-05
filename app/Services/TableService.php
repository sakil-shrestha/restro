<?php

namespace App\Services;

use App\Models\Table;

class TableService
{
    public function create(Array $data)
    {
         return Table::create([
            'table_number'=>$data['table_number'],
            'capacity'=>$data['capacity'],
            'status'=>$data['status'],

         ]);
    }

    public function updateStatus(string $status,Table $table)
    {
        return $table->update([
            'status'=>$status,
        ]);
    }
    public function delete($table)
    {
        return $table->delete();
    }

}
