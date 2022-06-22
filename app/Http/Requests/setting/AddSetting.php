<?php

namespace App\Http\Requests\setting;

use Illuminate\Foundation\Http\FormRequest;

class AddSetting extends FormRequest
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
            'settingName' => 'required|unique:table_setting,settingName',
            'value' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'settingName.required' => 'Tên setting không được bỏ trống',
            'settingName.unique' => 'Tên setting đã tồn tại',
            'value.required' => 'Value không được bỏ trống'
        ];
    }
}
