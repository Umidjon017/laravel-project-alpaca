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
            'try_link' => 'required',
            'more_link' => 'required',
            'order_id' => 'required',
            'image' => 'required|image|mimes:png,jpeg,jpg,webp,svg|max:2048',
            'translations.*.title' => 'required',
            'translations.*.description' => 'required',
            'translations.*.try_link_title' => 'required',
            'translations.*.more_link_title' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'try_link' => 'Link is required',
            'more_link' => 'Link is required',
            'order_id' => 'Order is required',
            'image.required' => 'Image is required',
            'image.image' => 'Image must be an image',
            'image.mimes' => 'Image format is required',
            'image.max' => 'Image size is required',
            'translations.*.title' => 'Title is required',
            'translations.*.description' => 'Description is required',
            'translations.*.try_link_title' => 'Description is required',
            'translations.*.more_link_title' => 'Description is required',
        ];
    }
}
