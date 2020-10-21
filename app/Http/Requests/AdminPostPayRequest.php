<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminPostPayRequest extends FormRequest
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
            'tst_name'    => 'required',
            'tst_email'   => 'required|email|unique:transactions,tst_email,' . $this->id,
            'tst_address' => 'required',
            'tst_phone'   => 'required|min:11|numeric|unique:transactions,tst_phone,' . $this->id,
        ];
    }
    public function messages()
    {
        return [
            'tst_name.required'    => 'Họ tên không được bỏ trống',
            'tst_email.required'   => 'Email không được để trống',
            'tst_email.unique'     => 'Email đã tồn tại',
            'tst_email.email'      => 'Email không đúng định dạng',
            'tst_address.required' => 'Địa chỉ không được để trống',
            'tst_phone.unique'     => 'Số điện thoại đã tồn tại',
            'tst_phone.required'   => 'Số điện thoại không được để trống',
            'tst_phone.min'        => 'Số điện thoại không đúng định dạng',
            'tst_phone.numeric'    => 'Số điện thoại không đúng định dạng',
        ];
    }
}
