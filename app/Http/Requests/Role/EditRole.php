<?php

namespace App\Http\Requests\Role;

use Illuminate\Foundation\Http\FormRequest;

class EditRole extends FormRequest
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
            'roleName' => 'required|unique:role,roleName,'.request()->id,
            'description' => 'required',
            'description' => 'required',
            'childPer' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'roleName.required' => 'Tên role không được bỏ trống',
            'roleName.unique' => 'Tên role đã tồn tại',
            'description.required' => 'Mô tả Role không được bỏ trống',
            'childPer' => 'Chọn ít nhật 1 quyền cho Role'
        ];
    }
}
