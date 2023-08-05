<?php

namespace App\Http\Requests\Social;

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
            'icon' => 'required|unique:socials,icon,'.$this->social_id.',id,deleted_at,NULL',
            'name' => 'required|unique:socials,name,'.$this->social_id.',id,deleted_at,NULL',
            'link' => 'required|unique:socials,link,'.$this->social_id.',id,deleted_at,NULL',
        ];
    }
}
