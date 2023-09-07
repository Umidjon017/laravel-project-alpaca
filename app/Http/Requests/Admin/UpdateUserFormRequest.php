<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserFormRequest extends FormRequest
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
            'password' => 'required',
            'retype_password' => 'required|same:password',
        ];
    }

    public function messages(): array
    {
        return [
            'email' => 'Email is required',
            'name' => 'Name is required',
            'password' => 'Text is required',
            'retype_password.required' => 'The passwords must fill in the same',
            'retype_password.same' => 'The passwords don\'t match',
        ];
    }
}
