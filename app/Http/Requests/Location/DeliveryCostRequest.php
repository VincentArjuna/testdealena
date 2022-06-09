<?php

namespace App\Http\Requests\Location;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class DeliveryCostRequest extends FormRequest
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
            'origin' => 'required|numeric',
            'originType' => 'required|string',
            'destination' => 'required|numeric',
            'destinationType' => 'required|string',
            'weight' => 'required|numeric',
            'courier' => 'required|in:jne,pos,tiki'
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
            'numeric' => ':attribute must be a number',
            'in' => ':attribute must contains :values'
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
            'origin' => 'Origin',
            'destination' => 'Destination',
            'weight' => 'Weight',
            'courier' => 'Courier'
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
