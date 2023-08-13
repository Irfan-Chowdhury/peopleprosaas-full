<?php

namespace App\Http\Requests\Setting;

use Illuminate\Foundation\Http\FormRequest;

class GeneralSettingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'site_title' => 'required|string|min:3|max:50',
            'currency_code' => 'required|string|min:3|max:50',
            'developed_by' => 'required|string|min:3|max:50',
            'footer' => 'required|string|min:3|max:50',
            'email' => 'required|email', //unique and condition
            'phone' => 'required|numeric',
            'free_trial_limit' => 'required|numeric',
            'site_logo' => 'image|mimes:jpg,jpeg,png,gif|max:100000',
            'footer_link' => 'required|url',
        ];
    }
}
