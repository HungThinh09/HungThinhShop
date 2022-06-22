<?php

namespace App\Http\Requests\home;

use Illuminate\Foundation\Http\FormRequest;

class AddOrder extends FormRequest
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
            'name' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên khách hàng không được bỏ trống',
            'phone.required' => 'Số điện thoại không được bỏ trống',
            'phone.numeric' => 'Số điện thoại không hợp lệ',
            'address' => 'Địa chỉ nhận hàng không được bỏ trống'
        ];
    }
}
