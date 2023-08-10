<?php

namespace App\Http\Requests\Faq;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFaqRequest extends FormRequest
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
        return [
            'question' => 'required|string|min:3|max:200|unique:faq_details,question,'.$this->faq_detail_id.',id,deleted_at,NULL',
            'answer' => 'required|string|unique:faq_details,answer,'.$this->faq_detail_id.',id,deleted_at,NULL',
        ];
    }
}
