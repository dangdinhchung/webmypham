<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequestAccount extends FormRequest
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
            'email'    => 'required|email|unique:admins,email,' . $this->id,
            'name'     => 'required|max:99|min:4',
            'address'  => 'required',
            'phone'    => 'required|min:11|numeric|unique:admins,phone,' . $this->id,
            'roles'    => 'required',
        ];

        if (!$this->id) 
        {
            $rules['password'] = 'required|min:8';
        }

        if($this->avatar) {
            $merge_rules = [
                'avatar'   => 'image|mimes:jpeg,png,jpg,gif,svg',
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
            'address.required'  => 'Địa chỉ không được bỏ trống',
            'avatar.mimes'      => 'Hình ảnh không đúng định dạng',
            'avatar.image'      => 'Hình ảnh không đúng định dạng',
            'roles.required'    => "Chức vụ không được bỏ trống"
        ];
    }
}
