<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
                'title' => 'required|string|max:70|unique:pages',
                'description' => 'required|string|max:155',
                'keywords' => 'required|string|max:200',
                'content' => 'required',
                'schema' => 'nullable',
                'telephone' => 'nullable|string|max:70',
                'slug' => 'required|string|max:50|unique:pages|unique:posts',
                'photo' => 'nullable',
            ];
        }

        if ($this->getMethod() === 'PUT') {
            return [
                'title' => ['required', 'string', 'max:70', Rule::unique('pages')->ignore($this->page->id)],
                'description' => ['required','string','max:155'],
                'keywords' => ['required','string','max:200'],
                'content' => ['required'],
                'schema' => ['nullable'],
                'telephone' => ['nullable','string','max:70'],
                'slug' => ['required','string','max:50', Rule::unique('posts')->ignore($this->page->id),Rule::unique('pages')->ignore($this->page->id)],
                'photo' => 'nullable',
            ];
        }
    }
}
