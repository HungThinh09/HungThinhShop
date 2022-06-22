<?php

namespace App\Http\Requests\banner;

use Illuminate\Foundation\Http\FormRequest;

class EditBanner extends FormRequest
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
            'bannerName' => 'required|unique:banners,bannerName,'.request()->id,
            'image' => 'image|mimes:jpg,png,gif,svg,jpeg|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'bannerName.require' => 'Tên banner không được bỏ trống',
            'bannerName.unique' => 'Tên banner đã tồn tại',
        ];
    }
}
