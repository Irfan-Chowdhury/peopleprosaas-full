<?php

namespace App\Http\Requests\Language;

use Illuminate\Foundation\Http\FormRequest;
class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => 'required| unique:languages,name,NULL,id,deleted_at,NULL',
            'locale' => [
                'required',
                'string',
                // 'regex:/^[a-z]*$/',
                'unique:languages,locale,NULL,id,deleted_at,NULL',
                function ($attribute, $value, $fail) {
                    if ($value !== strtolower($value)) {
                        $fail('The :attribute must be in lowercase.');
                    }
                },
            ],
        ];

    }
}
