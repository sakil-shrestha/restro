<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MenuResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'category_id'=>$this->category_id,
            'image'=>asset($this->image),
            'price'=>$this->price,
            'description'=>$this->description,
            'is_available'=>$this->is_available,
            'category'=>[
                'id'=>$this->category->id,
                'name'=>$this->category->name,
                'description'=>$this->category->description,
                'status'=>$this->category->status,
            ]

        ];
    }
}
