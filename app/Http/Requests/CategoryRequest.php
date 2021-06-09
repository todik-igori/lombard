<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules=[
            'code'=>'required|unique:categories,code',
            'name'=>'required',
            'description'=>'required',
            ];
        if ($this->route()->named('categories.update')){
            $rules['code'].=','. $this->route()->parameter('category');
}
        return $rules;


    }
    public function messages()
    {
        return[
            'required'=>'Поле :attribute обязательно для ввода'
        ];
    }
}
