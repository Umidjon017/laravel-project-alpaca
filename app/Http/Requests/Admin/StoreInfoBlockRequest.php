<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreInfoBlockRequest extends FormRequest
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
            'order_id' => 'required',
            'translations.*.title' => 'required',
            'translations.*.description' => 'required',
            'translations.*.body' => 'required',
            'translations.*.link_title' => 'required',
            'image' => 'nullable'
        ];
    }

    public function messages(): array
    {
        return [
            'order_id' => 'Order id is required',
            'translations.*.title' => 'Title is required',
            'translations.*.description' => 'Description is required',
            'translations.*.body' => 'Body is required',
            'translations.*.link_title' => 'Link title is required',
        ];
    }
}
