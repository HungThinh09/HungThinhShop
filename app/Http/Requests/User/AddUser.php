<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class AddUser extends FormRequest
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
            'user' => 'required|unique:users,user',
            'email' => 'required|unique:users,email|email',
            'password' => 'required',
            're_password' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên nhân viên không được bỏ trống',
            'user.required' => 'User không được bỏ trống',
            'user.unique' => 'User này đã tồn tại',
            'email.required' => 'Email không được bỏ trống',
            'email.email' => 'Định dạng email chưa đúng',
            'emai.unique' => 'Email này đã được sử dụng',
            'password.required' => 'Bạn chưa nhập Password',
            're_password.required' => 'Bạn cần phải nhập lại password',
        ];
    }
}
