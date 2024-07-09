<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
class StoreParameterMasterRequest extends FormRequest
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
            'parameter_name' => [
                'required',
                'string',
                Rule::unique('parameter_master', 'parameter_name')->ignore($this->route('parameter')) // Add unique validation
            ],
            'help_text' => 'required|string',
            'slug' => [
                'required',
                'string',
                'regex:/^[a-zA-Z0-9_]+$/',
                Rule::unique('parameter_master', 'slug')->ignore($this->route('parameter')) // Add unique validation
            ],
            'type' => 'required|string',
            'value' => 'required|string',
        ];
    
    
        // Add custom validation rule for the "Value" field based on the "Type" field
        if ($this->input('type') === '1') {
            $rules['value'] = 'required|in:0,1';
        }
    
        return $rules;
    }
    public function messages(): array
    {
        return [
            'parameter_name.required' => 'The Parameter name field is required.',
            'parameter_name.unique' => 'Parameter name has already been added.',
            'slug.required' => 'The Slug field is required.',
            'slug.unique' => 'Slug has already been added.',
        ];
    }
    
}