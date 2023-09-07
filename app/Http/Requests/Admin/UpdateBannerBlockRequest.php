<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBannerBlockRequest extends FormRequest
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
            'try_link' => 'required',
            'more_link' => 'required',
            'translations' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'try_link' => 'Try button\'s link is required',
            'more_link' => 'More buttons\'s link is required',
            'translations.*.title.required' => 'Title is required',
            'translations.*.description.required' => 'Description is required',
        ];
    }
}
