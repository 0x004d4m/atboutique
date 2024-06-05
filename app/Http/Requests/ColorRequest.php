<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ColorRequest extends FormRequest
{
    public function authorize()
    {
        return backpack_auth()->check() && backpack_user()->can('Manage Colors');
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'hex' => 'required',
        ];
    }
}
