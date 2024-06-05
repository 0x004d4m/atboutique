<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequestRequest extends FormRequest
{
    public function authorize()
    {
        return backpack_auth()->check() && backpack_user()->can('Manage Contact Requests');
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
            'message' => 'required',
        ];
    }
}
