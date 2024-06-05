<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StateRequest extends FormRequest
{
    public function authorize()
    {
        return backpack_auth()->check() && backpack_user()->can('Manage States');
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'country_id' => 'required|exists:countries,id',
        ];
    }
}
