<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
          'category_name' => 'required|string',
          'category_code' => '',
          'category_note' => '',

          'updated_by_id' => 'required|int',
          'updated_by_name' => 'required|string',
        ];
    }

    protected function prepareForValidation() {
      $this->merge([
        'category_name' => strip_tags($this->category_name),
        'category_code' => strip_tags($this->category_code),
        'category_note' => strip_tags($this->category_note),

        'updated_by_id' => strip_tags($this->updated_by_id),
        'updated_by_name' => strip_tags($this->updated_by_name),
      ]);
    }
}
