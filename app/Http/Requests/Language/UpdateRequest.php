<?php

namespace App\Http\Requests\Language;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => 'required|unique:languages,name,'.$this->language_id.',id,deleted_at,NULL',
            'locale' => [
                'required',
                'string',
                'unique:languages,locale,'.$this->language_id.',id,deleted_at,NULL',
                // 'regex:/^[a-z]*$/',
                function ($attribute, $value, $fail) {
                    if ($value !== strtolower($value)) {
                        $fail('The :attribute must be in lowercase.');
                    }
                },
            ],
        ];
    }
}
