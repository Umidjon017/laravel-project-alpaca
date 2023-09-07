<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreTextBlockRequest extends FormRequest
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
            'translations.*.text' => 'required',
            'order_id' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'translations.*.title' => 'Title is required',
            'translations.*.text' => 'Text is required',
            'order_id' => 'Order is required'
        ];
    }
}
