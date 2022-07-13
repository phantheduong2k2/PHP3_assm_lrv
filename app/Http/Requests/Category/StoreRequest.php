<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => [
                'bail',
                'required',
                'min:5',
                'unique:App\Models\Category,name'
            ]

        ];
    }

    public function messages()
    {
        return [
           'required' => 'Tên danh mục không được để trống',
           'min'=> 'Tên danh mục bắt buộc phải trên 5 kí tự',
           'unique'=> 'Tên danh mục đã tông tại'
        ];
    }
}
