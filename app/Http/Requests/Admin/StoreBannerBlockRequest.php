<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreBannerBlockRequest extends FormRequest
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
            'link' => 'required',
            'image' => 'required',
            'translations' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'image' => 'Image is required',
            'link' => 'Link is required',
            'translations.*.title.required' => 'Title is required',
            'translations.*.description.required' => 'Description is required',
        ];
    }
}
