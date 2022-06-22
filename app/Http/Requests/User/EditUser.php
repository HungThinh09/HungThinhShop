<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class EditUser extends FormRequest
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
            'user' => 'required|unique:users,user,'.request()->id,
            'email' => 'required|unique:users,email,'.request()->id,
          
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên nhân viên không được bỏ trống',
            'user.required' => 'User này đã tồn tại',
            'email.required' => 'Email không được bỏ trống',
            'email.email' => 'Định dạng email chưa đúng',
            'emai.unique' => 'Email này đã được sử dụng',
        
        ];
    }
}

