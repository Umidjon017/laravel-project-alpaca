<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
      'translations'=>'required|array',
      'translations.*.title'=>'required|unique:post_translations',
    ];
  }

  public function messages()
  {
    return [
      'translations.*.title.required'=>'Поле обязательно для заполнения',
      'translations.*.title.unique'=>'Заголовок должен быть уникальным',
    ];
  }
}
