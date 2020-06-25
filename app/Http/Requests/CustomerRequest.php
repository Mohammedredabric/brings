<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
          'fname' => 'required|string|max:255',
          'lname' => 'required|string|max:255',
          'phone' => 'required|string|max:255',
          'avatar' => 'required_without:id|mimes:jpg,jpeg,png',
          'address' => 'required|string|max:255',
          'city' => 'required|string|max:255',
          'bank' => 'required|string|max:150',
          'rib' =>'required|string|max:30',
          'email' => 'required|email|max:255|unique:customers,id',
          'password' =>'required_without:id',
          'discount' =>'required_without:id'
        ];

    }
}
