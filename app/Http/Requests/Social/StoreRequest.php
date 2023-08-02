<?php

namespace App\Http\Requests\Social;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:socials,name,NULL,id,deleted_at,NULL',
            'icon' => 'required|unique:socials,icon,NULL,id,deleted_at,NULL',
            'link' => 'required|unique:socials,link,NULL,id,deleted_at,NULL',
        ];
    }
}
