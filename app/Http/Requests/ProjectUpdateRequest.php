<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'region_id'=>'required',
            'apartments'=>'required',
            'floors'=>'required',
            'status'=>'required',
            'translations'=>'required|array',
        ];
    }

    public function messages()
    {
        return [
            'translations.*.name.required'=>'Поле обязательно для заполнения',
            'translations.*.name.unique'=>'Заголовок должен быть уникальным',
        ];
    }
}
