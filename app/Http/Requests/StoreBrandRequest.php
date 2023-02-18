<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandRequest extends FormRequest
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
          'brand_name' => 'required|string',
          'brand_code' => '',
          'brand_note' => '',

          'created_by_id' => 'required|int',
          'created_by_name' => 'required|string',
        ];
    }

    protected function prepareForValidation() {
      $this->merge([
        'brand_name' => strip_tags($this->brand_name),
        'brand_code' => strip_tags($this->brand_code),
        'brand_note' => strip_tags($this->brand_note),

        'created_by_id' => strip_tags($this->created_by_id),
        'created_by_name' => strip_tags($this->created_by_name),
      ]);
    }
}
