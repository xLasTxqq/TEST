<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>'max:255|required',
            'description'=>'max:255|required',
            'img'=>'file|image|required',
        ];
    }
}
