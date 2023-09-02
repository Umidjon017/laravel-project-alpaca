<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppealFormRequest extends FormRequest
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
            'email' => 'required',
            'name' => 'required',
            'text' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'email' => 'Email is required',
            'name' => 'Name is required',
            'text' => 'Text is required',
        ];
    }
}
