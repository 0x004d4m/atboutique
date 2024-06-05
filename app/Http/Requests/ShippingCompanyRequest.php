<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShippingCompanyRequest extends FormRequest
{
    public function authorize()
    {
        return backpack_auth()->check() && backpack_user()->can('Manage Shipping Companies');
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'cost_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
        ];
    }
}
