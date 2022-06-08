<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
        if ($this->getMethod() === 'POST') {
            return [
                'title' => 'required|string|max:70|unique:categories',
                'description' => 'required|string|max:155',
                'image' => 'required',
                'slug' => 'required|string|max:50|unique:categories',
            ];
        }

        if ($this->getMethod() === 'PUT') {
            return [
                'title' => ['required', 'string', 'max:70', Rule::unique('categories')->ignore($this->category->id)],
                'description' => ['required', 'string', 'max:155'],
                'image' => ['required'],
                'slug' => ['required', 'string', 'max:50', Rule::unique('categories')->ignore($this->category->id)],
            ];
        }
    }
}