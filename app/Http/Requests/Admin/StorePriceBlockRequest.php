<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StorePriceBlockRequest extends FormRequest
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
            'translations.*.excepted_options' => 'required',
            'translations.*.package_period' => 'required',
            'translations.*.link_title' => 'required',
            'price' => 'required',
            'link' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'translations.*.title' => 'Title field is required',
            'translations.*.excepted_options' => 'Excepted options field is required',
            'translations.*.package_period' => 'Price period field is required',
            'translations.*.link_title' => 'Link title field is required',
            'price' => 'Price field is required',
            'link' => 'Link field is required',
        ];
    }
}
