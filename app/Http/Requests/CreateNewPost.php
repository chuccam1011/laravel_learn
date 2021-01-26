<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewPost extends FormRequest
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
            'title' => 'required|min:8|unique:posts',
            'category_id' => 'required',
            'description' => 'required',
            'content' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => "Tieeu canf k ddduocjw trongs"
        ];
    }
}
