<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestRegister extends FormRequest
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
        $rules = [
            'email'    => 'required|email|unique:users,email,' . $this->id,
            'name'     => 'required|max:99|min:4',
            'phone'    => 'required|min:11|numeric|unique:users,phone,' . $this->id,
            'password' => 'required|min:8',
            'address'  => 'required',
//            'g-recaptcha-response' => 'required|captcha'
        ];

        if($this->avatar) {
            $merge_rules = [
                'avatar'   => 'image|mimes:jpeg,png,jpg',
            ];
            $rules = array_merge($rules, $merge_rules);
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'name.required'     => 'Họ tên không được bỏ trống',
            'name.max'          => 'Họ tên phải lớn hơn 3 ký tự và nhỏ hơn 100 ký tự',
            'name.min'          => 'Họ tên phải lớn hơn 3 ký tự và nhỏ hơn 100 ký tự',
            'email.required'    => 'Email không được để trống',
            'email.unique'      => 'Email đã tồn tại',
            'email.email'       => 'Email không đúng định dạng',
            'phone.unique'      => 'Số điện thoại đã tồn tại',
            'phone.required'    => 'Số điện thoại không được để trống',
            'phone.min'         => 'Số điện thoại không đúng định dạng',
            'phone.numeric'     => 'Số điện thoại không đúng định dạng',
            'password.required' => 'Password không được để trống',
            'password.min'      => 'Password lớn hơn hoặc bằng 8 ký tự',
            'avatar.mimes'      => 'Chỉ được upload ảnh dạng .jpeg, .png, .jpg',
            'avatar.image'      => 'Chỉ được upload ảnh dạng .jpeg, .png, .jpg',
            'address.required'  => 'Địa chỉ không được để trống',
        ];
    }
}
