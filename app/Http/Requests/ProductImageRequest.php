<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductImageRequest extends FormRequest
{
    public function authorize()
    {
        return backpack_auth()->check() && backpack_user()->can('Manage Products');
    }

    public function rules()
    {
        return [
            'image' => 'required',
            'product_id' => 'required|exists:products,id',
        ];
    }
}
