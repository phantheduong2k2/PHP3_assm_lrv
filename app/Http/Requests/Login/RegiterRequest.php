<?php

namespace App\Http\Requests\Login;

use Illuminate\Foundation\Http\FormRequest;

class RegiterRequest extends FormRequest
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
            'name' => 'required|min:2|max:20',
            'password' => 'required|min:5|max:20',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'address' => 'required|min:30|max:100'
            //
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Email của bạn không đúng định dạng',
            'email.unique' => 'Email của bạn đã được đăng kí',
            // ----------------eamil---------------------

            'password.min' => 'password tối thiểu 5 ký tự',
            'password.max' => 'password tối đa 20 ký tự',
            'password.required' => 'Bạn chưa nhập password',
            // ----------------password------------------

            'name.required' => 'Bạn chưa nhập name',
            'name.min' => 'Name tối thiểu 2 kí tự',
            'name.max' => 'Name tối đa 20 kí tự',
            // --------------name------------------------

            'phone.required' => 'Bạn chưa nhập số điện thoai',
            // ----------------phone----------------------

            'address.required' => 'Bạn chưa nhập địa chỉ',
            'address.min' => 'Bạn phải nhập địa trỉ trên 30 kí tự',
            'address.max' => 'Bạn đã nhập quá số kí tự cho phép',
        ];
    }
}
