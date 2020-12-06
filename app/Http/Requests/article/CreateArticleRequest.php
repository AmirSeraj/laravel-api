<?php

namespace App\Http\Requests\article;

use Illuminate\Foundation\Http\FormRequest;

class createArticleRequest extends FormRequest
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
            //
            'title'=>'required|string|min:10|max:50|unique:articles',
            'body'=>'required|string'
        ];
    }
}
