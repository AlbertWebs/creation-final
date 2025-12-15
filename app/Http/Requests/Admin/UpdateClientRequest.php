<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'orders' => 'nullable|integer|min:0|max:999',
            'image' => 'nullable|image|max:2048',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The client name is required.',
            'orders.integer' => 'The order must be a number.',
            'orders.min' => 'The order must be at least 0.',
            'orders.max' => 'The order must not exceed 999.',
            'image.image' => 'The uploaded file must be an image.',
            'image.max' => 'The image size must not exceed 2MB.',
        ];
    }
}

