<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOurClientRequest extends FormRequest
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
            'translations.*.title' => 'required',
            'translations.*.description' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'translations.*.title' => 'Title is required',
            'translations.*.description' => 'Description is required',
        ];
    }
}
