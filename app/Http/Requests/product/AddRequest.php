<?php

namespace App\Http\Requests\product;

use Illuminate\Foundation\Http\FormRequest;

class AddRequest extends FormRequest
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
            'name' =>'required|unique:products,productName',
            'category'=> 'required',
            'price' => 'required ',
            'image' => 'required|image|mimes:jpg,png,gif,svg,jpeg|max:2048',
            
            
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được bỏ trống',
            'name.unique' => 'Tên sản phẩm đã tồn tại',
            'category.required' => 'bạn phải chọn ít nhất 1 danh mục',
            'price.required' => 'Giá sản phẩm không được bỏ trống',
            'image.required' => 'Bạn chưa chọn ảnh',
            'image.image' => 'File bạn chọn không phải là ảnh',
            'image.mimes' => 'Đuôi file ảnh không hợp lệ'
        ];
    }
}
