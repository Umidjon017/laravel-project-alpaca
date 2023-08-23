<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class StoreOurPartnerLogoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'logo' => 'required|image|max:5000|mimes:png,jpg,jpeg,gif',
            'link' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'logo.required' => 'Logo is required',
            'logo.image' => 'Logo must be a file',
            'logo.max' => 'Logo must be less than 5 mb',
            'logo.mimes' => 'Logo must be a png, jpg, jpeg or gif',
            'link' => 'Link is required',
        ];
    }
}
