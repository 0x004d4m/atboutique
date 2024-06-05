<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize()
    {
        return backpack_auth()->check() && backpack_user()->can('Manage Contacts');
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
            'phone' => 'required|integer',
            'address' => 'required',
            'maps' => 'required',
        ];
    }
}
