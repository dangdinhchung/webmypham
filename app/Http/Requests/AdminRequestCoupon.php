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
            'cp_start_date' => 'bail|date',
            'cp_end_date' => 'bail|date|after:cp_start_date',
        ];

        if($this->cp_discount_type == 'percent') {
            $merge_rules = [
                'cp_discount'    => 'numeric|max:100|min:0'
            ];
            $rules = array_merge($rules, $merge_rules);
        }
        return $rules;
    }
}
