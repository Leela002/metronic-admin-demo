<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
class StoreCategoryRequest extends FormRequest
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
        $rules = [
            'category_name' => [
                'required',
                'string',
                Rule::unique('category', 'category_name')->ignore($this->route('category')) // Add unique validation
            ],
            'status' => [
                'required',
                'string',
                Rule::in(['0', '1']) // Ensure the status is either 0 or 1
            ],
            'upload_icon' => [
                'required',
                'image', // Ensure the file is an image
                'mimes:jpeg,png,jpg,gif,svg', // Allow specific image types
                'max:2048' // Max size in kilobytes (2MB)
            ],
            
        ];
    
        return $rules;
    }
    public function messages(): array
    {
        return [
            'category_name.required' => 'The Category name field is required.',
            'category_name.unique' => 'Category name has already been added.',
            'status.required' => 'The Status field is required.',
            'upload_icon.required' => 'The Upload Icon field is required.',
            'upload_icon.image' => 'The Upload Icon must be an image.',
            'upload_icon.mimes' => 'The Upload Icon must be a file of type: jpeg, png, jpg, gif, svg.',
            'upload_icon.max' => 'The Upload Icon should not be greater than 2MB.',
        ];
    }
    
}