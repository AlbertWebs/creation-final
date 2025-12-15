<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Authorization handled by middleware
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
            'blockquote' => 'nullable|string|max:500',
            'content' => 'nullable|string',
            'content_extra' => 'nullable|string',
            'content_one' => 'nullable|string',
            'image_one' => 'nullable|image|max:2048',
            'content_two' => 'nullable|string',
            'image_two' => 'nullable|image|max:2048',
            'content_three' => 'nullable|string',
            'image_three' => 'nullable|image|max:2048',
            'content_four' => 'nullable|string',
            'image_four' => 'nullable|image|max:2048',
            'content_five' => 'nullable|string',
            'image_five' => 'nullable|image|max:2048',
            'credit' => 'nullable|string|max:255',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'title.required' => 'The blog title is required.',
            'category_id.required' => 'Please select a category.',
            'category_id.exists' => 'The selected category does not exist.',
            'image.image' => 'The uploaded file must be an image.',
            'image.max' => 'The image size must not exceed 2MB.',
        ];
    }
}

