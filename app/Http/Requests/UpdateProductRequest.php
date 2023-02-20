<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
          'product_name' => 'required|string',
          'product_cost' => 'nullable|numeric',
          'product_general_price' => 'required|numeric',
          'product_wholesale_price' => 'nullable|numeric',
          'product_special_price' => 'nullable|numeric',
          'product_barcode' => 'string|nullable',
          'product_description' => 'string|nullable',

          'product_image' => 'nullable|image|mimes:jpeg,png,jpg,svg,web,webp|max:2048',

          'product_category_id' => 'nullable|int',
          'product_brand_id' => 'nullable|int',

          'updated_by_id' => 'required|int',
          'updated_by_name' => 'required|string',
        ];
    }

    protected function prepareForValidation() {
      $this->merge([
        'product_name' => strip_tags($this->product_name),
        'product_cost' => strip_tags($this->product_cost),
        'product_general_price' => strip_tags($this->product_general_price),
        'product_wholesale_price' => strip_tags($this->product_wholesale_price),
        'product_special_price' => strip_tags($this->product_special_price),
        'product_barcode' => strip_tags($this->product_barcode),
        'product_description' => strip_tags($this->product_description),

        'product_image' => strip_tags($this->product_image),

        'product_category_id' => strip_tags($this->product_category_id),
        'product_brand_id' => strip_tags($this->product_brand_id),

        'updated_by_id' => strip_tags($this->updated_by_id),
        'updated_by_name' => strip_tags($this->updated_by_name),
      ]);
    }
}
