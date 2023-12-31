<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDirectSpeechRequest extends FormRequest
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
            'translations.*.text' => 'required',
            'translations.*.full_name' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'translations.*.text' => 'Text is required',
            'translations.*.full_name' => 'Full name is required',
        ];
    }
}
