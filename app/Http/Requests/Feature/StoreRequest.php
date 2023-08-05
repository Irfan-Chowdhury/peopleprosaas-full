<?php

namespace App\Http\Requests\Feature;

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
            'name' => 'required|unique:features,name,NULL,id,deleted_at,NULL',
            'icon' => 'required|unique:features,icon,NULL,id,deleted_at,NULL',
        ];
    }
}
