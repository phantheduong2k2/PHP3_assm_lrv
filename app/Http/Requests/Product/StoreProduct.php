<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
            'name' => 'required|min:5|max:30',
            'price' => 'required|numeric',
            'avatar' => 'required|image',
            'description' => 'required|min:20|max:255',
            'status' => 'required'
        ];
    }

    public function messages()
    {

       return [
        'name.required' => 'Bạn chưa nhập tên sản phẩm',
        'name.min' => 'Tên sản phẩm tối thiểu 5 kí tự',
        'name.max' => 'Tên sản phẩm không được quá 30 kí tự',
        // --------------------------------

        'price.required' => 'Bạn chưa nhập gía sản phẩm',
        'price.numeric' => 'Giá sản phẩm chưa đúng định dạng',
        // -----------------------------------------------

        'avatar.required' => 'Bạn chưa thêm ảnh sản phẩm',
        'avatar.image' => 'Bạn nhập file anhr chưa đúng định dạng',
        // --------------------------------------------------

        'description.required' => 'Bạn chưa nhập mô tả sản phẩm',
        'description.min' => 'Mô tả phải tối thối thiểu 20 kí tự',
        'description.max' => 'Mô tả phải tối đa đa 255 kí tự',
        // -------------------------------------------------

        'status.required' => 'Bạn chưa chọn trạng thái sản phẩm'
    ];
    }
}
