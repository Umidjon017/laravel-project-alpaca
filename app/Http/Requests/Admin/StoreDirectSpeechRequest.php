<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreDirectSpeechRequest extends FormRequest
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
            'translations.*.full_name' => 'required',
            'translations.*.text' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'translations.*.full_name' => 'Full name is required',
            'translations.*.text' => 'Text is required',
        ];
    }
}
