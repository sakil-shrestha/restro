<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name"=>'required|string|min:3|max:255',
            'price'=>'required|numeric|min:0|max:99999',
            'category_id'=>'required|integer|exists:categories,id',
            'image'=>'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
            'description'=>'required|string|max:1000',
            'is_available'=>'boolean',

        ];
    }
}
