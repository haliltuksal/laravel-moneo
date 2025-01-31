<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AddItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //auth yapısı olmadığından dolayı true yapılmıştır.
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'product_id' => 'required|integer|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ];
    }

    public function messages(): array
    {
        return [
            'product_id.required' => __('validation.required', ['attribute' => 'product_id']),
            'product_id.integer' => __('validation.integer', ['attribute' => 'product_id']),
            'product_id.exist' => __('validation.exist', ['attribute' => 'product_id']),
            'quantity.required' => __('validation.required', ['attribute' => 'quantity']),
            'quantity.integer' => __('validation.integer', ['attribute' => 'quantity']),
            'quantity.min' => __('validation.min', ['attribute' => 'quantity'])
        ];
    }
}
