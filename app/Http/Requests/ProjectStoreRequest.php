<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectStoreRequest extends FormRequest
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
            'card_image'=>'required|mimes:png,jpg,jpeg',
            'status'=>'required',
            'translations'=>'required|array',
            'translations.*.name'=>'required|unique:project_translations',
        ];
    }
}
