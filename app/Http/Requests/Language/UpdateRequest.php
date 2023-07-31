<?php

namespace App\Http\Requests\Language;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        // return [
        //     'attribute_name' => 'required|unique:attribute_translations,attribute_name,'.$this->attribute_translation_id.',id,deleted_at,NULL',
        // ];

        return [
            'name' => 'required|unique:languages,name,'.$this->language_id,
            'locale' => 'required|unique:languages,locale,'.$this->language_id,
        ];
    }
}
