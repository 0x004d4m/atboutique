<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocialRequest extends FormRequest
{
    public function authorize()
    {
        return backpack_auth()->check() && backpack_user()->can('Manage Socials');
    }

    public function rules()
    {
        return [
            'icon' => 'required',
            'link' => 'required',
        ];
    }
}
