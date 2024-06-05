<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SizeRequest extends FormRequest
{
    public function authorize()
    {
        return backpack_auth()->check() && backpack_user()->can('Manage Sizes');
    }

    public function rules()
    {
        return [
            'name' => 'required',
        ];
    }
}
