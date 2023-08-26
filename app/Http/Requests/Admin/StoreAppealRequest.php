<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppealRequest extends FormRequest
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
            'translations' => 'required|array',
        ];
    }

    public function messages(): array
    {
        return [
            'translations.*.title.required' => 'Title is required',
            'translations.*.description' => 'Description is required',
        ];
    }
}
