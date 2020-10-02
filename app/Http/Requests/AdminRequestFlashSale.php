<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequestFlashSale extends FormRequest
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
          'fs_title' => 'bail|required',
          'fs_start_date' => 'bail|required',
          'fs_end_date' => 'bail|required|after_or_equal:fs_start_date',
        ];
    }

    /**
     * @author chungdd
     * [messages description]
     * @return [type] [description]
     */
    public function messages()
    {
        return [
            'fs_title.required'   => 'Dữ liệu không được để trống',
            'fs_start_date.required'   => 'Dữ liệu không được để trống',
            'fs_end_date.required'   => 'Dữ liệu không được để trống',
            'fs_end_date.required'   => 'Ngày kết thúc phải >= ngày bắt đầu'
        ];
    }
}
