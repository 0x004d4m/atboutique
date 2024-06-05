<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsLetterRequest extends FormRequest
{
    public function authorize()
    {
        return backpack_auth()->check() && backpack_user()->can('Manage News Letters');
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
        ];
    }
}
