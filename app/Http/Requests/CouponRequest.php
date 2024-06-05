<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
{
    public function authorize()
    {
        return backpack_auth()->check() && backpack_user()->can('Manage Coupons');
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'discount' => 'required|integer',
        ];
    }
}
