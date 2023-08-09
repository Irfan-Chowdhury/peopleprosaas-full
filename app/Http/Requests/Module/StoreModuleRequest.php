<?php

namespace App\Http\Requests\Module;

use Illuminate\Foundation\Http\FormRequest;

class StoreModuleRequest extends FormRequest
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
        $rules = [
            'heading' => 'required|string|min:3|max:50',
            'sub_heading' => 'required|string',
            'image' => 'image|mimes:jpg,jpeg,png,gif|max:100000',
        ];

        if($this->is_allow) {
            $rules['name'] = 'required|string|min:3|max:50|unique:module_details,name,NULL,id,deleted_at,NULL';
            $rules['description'] = 'required|string';
            $rules['icon'] = 'required|string';
        }

        return $rules;
    }
}
