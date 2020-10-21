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
          'fs_start_date' => [
              'required',
              'date_format:Y-m-d',// format without hours, minutes and seconds.
              'after_or_equal:' . date('Y-m-d'),
          ],
          'fs_end_date' => 'bail|required|after_or_equal:fs_start_date',
          'products' => 'bail|required|array|min:4',
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
            'fs_title.required'            => 'Tiêu đề không được để trống',
            'fs_start_date.required'       => 'Ngày bắt đầu không được để trống',
            'fs_start_date.after_or_equal' => 'Ngày bắt đầu >= ngày hiện tại',
            'fs_start_date.date_format' => 'Ngày bắt đầu sai định dạng ',
            'fs_end_date.required'         => 'Ngày kết thúc không được để trống',
            'fs_end_date.after_or_equal'   => 'Ngày kết thúc phải >= ngày bắt đầu',
            'products.required'            => 'Bạn chưa chọn sản phẩm nào',
            'products.array'               => 'Hãy chọn ít nhất 4 sản phẩm',
            'products.min'                 => 'Hãy chọn ít nhất 4 sản phẩm',
        ];
    }
}
