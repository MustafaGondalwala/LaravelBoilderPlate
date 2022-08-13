<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PageStore extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:pages,name,'.$this->id,
            'component' => 'required|array',
            'header_item' => 'sometimes|array',
            'footer_item' => 'sometimes|array',
            'status' => 'required|boolean',
        ];
    }
}
