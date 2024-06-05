<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function authorize()
    {
        return backpack_auth()->check() && backpack_user()->can('Manage Orders');
    }

    public function rules()
    {
        return [
            'customer_id' => 'required|exists:customers,id',
            'country_id' => 'required|exists:countries,id',
            'state_id' => 'required|exists:states,id',
            'city_id' => 'required|exists:cities,id',
            'zip_code' => 'required',
            'address' => 'required',
            'shipping_company_id' => 'required|exists:shipping_companies,id',
            'order_status_id' => 'required|exists:order_statuses,id',
            'coupon_id' => 'required|exists:coupons,id',
            'total_cost_price' => 'required|numeric',
            'total_selling_price' => 'required|numeric',
        ];
    }
}
