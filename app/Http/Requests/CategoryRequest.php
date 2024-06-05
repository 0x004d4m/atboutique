<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize()
    {
        return backpack_auth()->check() && backpack_user()->can('Manage Categories');
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'image' => 'required',
        ];
    }
}
