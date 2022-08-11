<?php

namespace App\Http\Requests\Login;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'password_lg' => 'required|min:2|max:15',
            'email_lg' => 'required|email|',
        ];

    }
    public function messages()
    {
        return [
            'email_lg.required' => 'Email bắt buộc nhập',
            'email_lg.email' => 'Email của bạn không đúng định dạng',
            // ----------------eamil---------------------

            'password_lg.min' => 'password tối thiểu 2 ký tự',
            'password_lg.max' => 'password tối đa 15 ký tự',
            'password_lg.required' => 'Bạn chưa nhập password',
        ];
    }
}
