<?php

namespace App\Http\Requests\Category;

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
            'name' => 'required|unique:categories,categoryName',
            'parent_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên Danh mục',
            'name.unique' => 'Tên danh mục đã tồn tại',
            'parent_id.required' => 'Có lỗi khi tạo parentId',
        ];
    }
}
