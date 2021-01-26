<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegister extends FormRequest
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
        return [
            'full_name' => 'required|min:6',
            'email' => 'required|email:rfc',
            'password' => 'required|min:6',
            're-password' => 'required|same:password'
        ];
    }

    public function messages()
    {
        return [
            'password.required' => "Mật khẩu không được trống",
            're-password.required' => "Mật khẩu không được trống",
            're-password.same' => "Mật khẩu không trùng khớp",
            'password.min' => "Mật khẩun quá ngắn cần lớn hơn 6 ký tự",
            'full_name.min' => "Mật khẩu quá ngắn cần lớn hơn 6 ký tự",
            'email.email' => "Email không  hợp lệ"
        ];
    }
}
