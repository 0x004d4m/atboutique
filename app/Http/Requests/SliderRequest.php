<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
{
    public function authorize()
    {
        return backpack_auth()->check() && backpack_user()->can('Manage Sliders');
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
        ];
    }
}
