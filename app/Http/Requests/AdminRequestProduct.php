<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequestProduct extends FormRequest
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
            'pro_name'          => 'required|max:190|min:4|unique:products,pro_name,' . $this->id,
            'pro_price'         => 'required|integer|min:1',
            'pro_number' => 'required|integer|min:1',
            'pro_description'   => 'required',
            'pro_category_id'   => 'required',
            'pro_content'       => 'required',
            'attribute'         => 'required',
        ];

        if($this->pro_sale) {
            $merge_rules = [
                'pro_sale'         => 'integer|min:0|max:100',
            ];
            $rules = array_merge($rules, $merge_rules);
        }

        if($this->pro_avatar) {
            $merge_rules = [
                'pro_avatar'   => 'image|mimes:jpeg,png,jpg,gif,svg',
            ];
            $rules = array_merge($rules, $merge_rules);
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'pro_name.required'          => 'Tên sản phẩm không được bỏ trống',
            'pro_name.max'               => 'Tên sản phẩm phải lớn hơn 3 ký tự và nhỏ hơn 190 ký tự',
            'pro_name.min'               => 'Tên sản phẩm phải lớn hơn 3 ký tự và nhỏ hơn 190 ký tự',
            'pro_name.unique'            => 'Tên sản phẩm đã tồn tại',
            'pro_price.required'         => 'Giá sản phẩm không được bỏ trống',
            'pro_price.integer'          => 'Giá sản phẩm không đúng định dạng',
            'pro_price.min'              => 'Giá sản phẩm phải lớn hơn 0',
            'pro_sale.integer'           => 'Giá giảm sai định dạng',
            'pro_sale.min'               => 'Giá giảm sản phẩm phải từ 0 đến 100%',
            'pro_sale.max'               => 'Giá giảm sản phẩm phải từ 0 đến 100%',
            'pro_number.required' => 'Số lượng không được bỏ trống',
            'pro_number.integer'  => 'Số lượng sai định dạng',
            'pro_number.min'      => 'Số lượng phải lớn hơn 0',
            'pro_description.required'   => 'Mô tả sản phẩm không được bỏ trống',
            'pro_category_id.required'   => 'Danh mục sản phẩm không được bỏ trống',
            'attribute.required'         => 'Thuộc tính sản phẩm không được bỏ trống',
            'pro_content.required'       => 'Nội dung sản phẩm không được bỏ trống',
            'pro_avatar.mimes'           => 'Sai định dạng hình ảnh',
            'pro_avatar.image'           => 'Sai định dạng hình ảnh'
        ];
    }
}
