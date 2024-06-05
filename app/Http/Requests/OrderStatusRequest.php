<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderStatusRequest extends FormRequest
{
    public function authorize()
    {
        return backpack_auth()->check() && backpack_user()->can('Manage Order Statuses');
    }

    public function rules()
    {
        return [
            'name' => 'required',
        ];
    }
}
