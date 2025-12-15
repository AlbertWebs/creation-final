<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePortfolioRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'client' => 'nullable|string|max:255',
            'meta' => 'nullable|string',
            'content' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'image_one' => 'nullable|image|max:2048',
            'image_two' => 'nullable|image|max:2048',
            'image_three' => 'nullable|image|max:2048',
            'image_four' => 'nullable|image|max:2048',
            'image_five' => 'nullable|image|max:2048',
            'image_six' => 'nullable|image|max:2048',
            'image_seven' => 'nullable|image|max:2048',
            'image_eight' => 'nullable|image|max:2048',
            'image_nine' => 'nullable|image|max:2048',
            'image_ten' => 'nullable|image|max:2048',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'title.required' => 'The portfolio title is required.',
            '*.image' => 'The uploaded file must be an image.',
            '*.max' => 'The image size must not exceed 2MB.',
        ];
    }
}

