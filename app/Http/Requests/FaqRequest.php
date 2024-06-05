<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
{
    public function authorize()
    {
        return backpack_auth()->check() && backpack_user()->can('Manage Faqs');
    }

    public function rules()
    {
        return [
            'question' => 'required',
            'answer' => 'required',
        ];
    }
}
