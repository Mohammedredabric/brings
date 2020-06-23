<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
          'ref' => 'required|string|max:255',
          'name' => 'required|string|max:255',
          'price' => 'required|numeric|max:255',
          'paking_type' => 'required|string|max:255',
          'image' => 'required|image',
          'description' => 'required|string|max:255',
        ];
    }
}
