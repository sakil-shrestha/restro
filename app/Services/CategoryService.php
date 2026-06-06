<?php
namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function create(Array $data){
        return Category::create($data);
    }
     public function update(Array $data,Category $category){
        return $category->update([
            'name'=>$data['name'],
            'description'=>$data['description'],
            'status'=>$data['status'],
        ]);
    }

    public function updateStatus(string $status,Category $category)
    {
        return $category->update([
            'status' =>$status,
        ]);
    }
}
