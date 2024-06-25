<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    public function authorize()
    {
        return backpack_auth()->check() && backpack_user()->can('Manage Customers');
    }

    public function rules()
    {
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'country_id' => 'required|exists:countries,id',
            'state_id' => 'required|exists:states,id',
            'zip_code' => 'required|integer',
            'address' => 'required',
            'phone' => 'required|integer',
        ];

        if ($this->isMethod('post')) {
            $rules['password'] = 'required|password';
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            $rules['password'] = 'nullable|password';
        }

        return $rules;
    }
}
