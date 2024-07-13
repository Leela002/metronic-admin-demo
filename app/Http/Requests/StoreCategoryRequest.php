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
            
        ];
    
        return $rules;
    }
    public function messages(): array
    {
        return [
            'category_name.required' => 'The Category name field is required.',
            'category_name.unique' => 'Category name has already been added.',
            'status.required' => 'The Status field is required.',
        ];
    }
    
}