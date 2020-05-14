<?php

namespace App\Http\Requests\Backend\Pages;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
            'name' => ['required','max:25'],
            'description' => ['required', 'max:255'],
            'mete_keywords' => ['string','max:161'],
            'mete_desc' => ['string','max:161']
        ];
    }
}
