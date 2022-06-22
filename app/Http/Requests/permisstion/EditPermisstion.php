<?php

namespace App\Http\Requests\permisstion;

use Illuminate\Foundation\Http\FormRequest;

class EditPermisstion extends FormRequest
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
            'name' => 'Required|unique:permisstions,name,'.request()->id
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên Permisstion không được bỏ trống',
            'name.unique' => 'Tên permisstion đã tồn tại',
            
        ];
    }
}
