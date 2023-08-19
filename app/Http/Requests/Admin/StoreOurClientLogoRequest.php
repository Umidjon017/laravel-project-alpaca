<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreOurClientLogoRequest extends FormRequest
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
            'logo' => 'required|mimes:png,jpg,jpeg,gif'
        ];
    }

    public function messages(): array
    {
        return [
            'logo.required' => 'Logo is required',
            'logo.mimes' => 'Logo must be a png, jpg, jpeg or gif'
        ];
    }
}
