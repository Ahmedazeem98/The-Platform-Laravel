<?php

namespace App\Http\Requests\BackEnd\Videos;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
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
            'name' => ['required', 'string','max:25'],
            'description' => ['required','min:10'],
            'meta_keywords' => ['max:161'],
            'meta_desc ' =>  ['max:161'],
            'youtube' => ['required','url'],
            'cat_id' => ['required','integer'],
            'published' => ['required'],
        ];
    }
}
