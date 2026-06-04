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

    public function updateStatus()
    {

    }
    public function delete()
    {

    }

}
