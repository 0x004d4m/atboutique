<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
{
    public function authorize()
    {
        return backpack_auth()->check() && backpack_user()->can('Manage Countries');
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'country_code' => 'required|integer',
            'currency' => 'required',
            'currency_to_usd' => 'required|numeric',
            'flag' => 'required',
            'digits_after_country_code' => 'required|integer',
        ];
    }
}
