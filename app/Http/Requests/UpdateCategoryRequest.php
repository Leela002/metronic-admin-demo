<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'status' => [
                'required',
                'string',
                Rule::in(['0', '1']) // Ensure the status is either 0 or 1
            ],
            'upload_icon' => [
                'nullable', // Make the image upload optional
                'image', // Ensure the file is an image
                'mimes:jpeg,png,jpg,gif,svg', // Allow specific image types
                'max:2048' // Max size in kilobytes (2MB)
        ],
        ];
    }

    public function messages(): array
    {
        return [
            'status.required' => 'The Status field is required.',
            'status.string' => 'The Status must be a string.',
            'status.in' => 'The selected Status is invalid.',
            'upload_icon.image' => 'The Upload Icon must be an image.',
            'upload_icon.mimes' => 'The Upload Icon must be a file of type: jpeg, png, jpg, gif, svg.',
            'upload_icon.max' => 'The Upload Icon should not be greater than 2MB.',
        ];
    }
}
