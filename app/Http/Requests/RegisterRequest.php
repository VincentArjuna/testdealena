<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8',
            'province_id' => 'required|numeric',
            'city_id' => 'required|numeric',
            'subdistrict_id' => 'required|numeric',
            'postal_code' => 'required|numeric',
            'address' => 'required|string',
            'birth_date' => 'string',
            'gender' => 'string',
            'photo_url' => 'string|nullable',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'A :attribute is required',
            'string' => 'A :attribute must be a string',
            'email' => 'Is not valid email',
            'max' => ':attribute field must not exceed :max',
            'min' => ':attribute field must have minimun :min length',
            'unique' => ':attribute has been taken',
            'numeric' => ':attribute must be a number'
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'Name',
            'username' => 'Username',
            'email' => 'Email Address',
            'phone' => 'Telephone',
            'password' => 'Password',
            'province_id' => 'Province',
            'city_id' => 'City',
            'postal_code' => 'Postal Code'
        ];
    }

    /**
     * If validator fails return the exception in json form
     * @param Validator $validator
     * @return array
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => false,
            'message' => 'Form validation error!',
            'errors' => $validator->errors()->all()
        ], 422));
    }
}
