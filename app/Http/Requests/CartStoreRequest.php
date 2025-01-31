<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CartStoreRequest extends FormRequest
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
            'user_id' => 'required|integer|min:1',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => __('validation.required', ['attribute' => 'user_id']),
            'user_id.integer' => __('validation.integer', ['attribute' => 'user_id']),
            'user_id.min' => __('validation.min', ['attribute' => 'user_id']),
        ];
    }
}
