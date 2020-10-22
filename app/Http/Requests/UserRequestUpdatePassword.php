<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequestUpdatePassword extends FormRequest
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
            'password_old' => 'required',
            "password"     => 'required|min:8',
            "re_password"  => 'same:password',
        ];
    }
    public function messages()
    {
        return [
            'password_old.required' => 'Mật khẩu cũ không được bỏ trống!',
            'password.required'     => 'Mật khẩu không được bỏ trống!',
            'password.min'          => 'Mật khẩu phải có độ dài lớn hơn hoặc bằng 8 ký tự',
            're_password.same'      => 'Mật khẩu không khớp!'
        ];
    }
}
