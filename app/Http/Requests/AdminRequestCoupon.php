<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequestCoupon extends FormRequest
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
            'cp_code' => 'bail|required|max:190|min:3|unique:coupons,cp_code,'.$this->id,
            'cp_start_date' => [
                'required',
                'date_format:Y-m-d',
                'after_or_equal:' . date('Y-m-d'),
            ],
            'cp_end_date' => 'bail|required|after_or_equal:cp_start_date',
        ];

        if($this->cp_discount_type) {
            $merge_rules = [
                'cp_discount'    => 'numeric|max:100|min:0'
            ];
            $rules = array_merge($rules, $merge_rules);
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'cp_code.required'             => 'Mã giảm giá không được để trống',
            'cp_code.max'                  => 'Mã giảm giá có độ dài từ 3 đến 190 ký tự',
            'cp_code.min'                  => 'Mã giảm giá có độ dài từ 3 đến 190 ký tự',
            'cp_code.unique'               => 'Mã giảm giá đã tồn tại',
            'cp_start_date.required'       => 'Ngày bắt đầu không được để trống',
            'cp_start_date.after_or_equal' => 'Ngày bắt đầu >= ngày hiện tại',
            'cp_start_date.date_format'    => 'Ngày bắt đầu sai định dạng ',
            'cp_end_date.required'         => 'Ngày kết thúc không được bỏ trống ',
            'cp_end_date.after_or_equal'   => 'Ngày kết thúc phải >= ngày bắt đầu',
            'cp_discount.numeric'          => 'Giảm giá sai định dạng',
            'cp_discount.max'              => 'Giảm giá từ 0 đến 100 %',
            'cp_discount.min'              => 'Giảm giá từ 0 đến 100 %',
        ];
    }
}
