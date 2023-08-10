<?php

namespace App\Http\Requests\Faq;

use Illuminate\Foundation\Http\FormRequest;

class StoreFaqRequest extends FormRequest
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
            // 'heading' => 'required|string|min:3|max:50|unique:faqs,heading,NULL,id,deleted_at,NULL',
            // 'sub_heading' => 'required|string|unique:faqs,sub_heading,NULL,id,deleted_at,NULL',
            'heading' => 'required|string|min:3|max:200',
            'sub_heading' => 'required|string',
        ];

        if($this->is_allow) {
            $rules['question'] = 'required|string|min:3|max:200|unique:faq_details,question,NULL,id,deleted_at,NULL';
            $rules['answer'] = 'required|string|unique:faq_details,answer,NULL,id,deleted_at,NULL';
        }

        return $rules;
    }
}
