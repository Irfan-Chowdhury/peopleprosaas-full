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
        // return [
        //     'name' => 'required| unique:languages,name,NULL,id,deleted_at,NULL',
        //     'locale' => 'required|unique:languages,locale,NULL,id,deleted_at,NULL',
        // ];
        return [
            'name' => 'required| unique:languages,name',
            'locale' => 'required|unique:languages,locale',
        ];
    }
}
