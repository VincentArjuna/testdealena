<?php

namespace App\Http\Requests\Product;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductSubmitRequest extends FormRequest
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
            'product_category_id' => 'required',
            'weight' => 'required|numeric',
            'start_bid' => 'required|numeric',
            'bid_multiplier' => 'required|numeric',
            'bid_start' => 'required|date_format:d-m-Y H:i:s',
            'bid_end' => 'date_format:d-m-Y H:i:s',
            'qty' => 'required|numeric',
            'images_front' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'images_back' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'images_left' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'images_right' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'min_deposit' => 'required|numeric',
            'bid_bin' => 'required|numeric'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [];
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
            'product_category_id' => 'Product Category',
            'weight' => 'Weight',
            'start_bid' => 'Start Bid',
            'bid_multiplier' => 'Bid Multiplier',
            'bid_start' => 'Bid Start',
            'bid_end' => 'Bid End',
            'qty' => 'Qty',
            'images_front' => 'Front Product Image',
            'images_back' => 'Back Product Image',
            'images_left' => 'Left Product Image',
            'images_right' => 'Right Product Image',
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
