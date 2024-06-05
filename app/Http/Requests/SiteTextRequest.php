<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteTextRequest extends FormRequest
{
    public function authorize()
    {
        return backpack_auth()->check() && backpack_user()->can('Manage Site Texts');
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
        ];
    }
}
