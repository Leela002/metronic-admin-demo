<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreCustomerRequest extends FormRequest
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
     * @return array<string>
     */
    public function rules(): array
    {
        return [
            'emp_id' => 'required|string|regex:/^(?=.*[a-zA-Z])(?=.*[0-9])[a-zA-Z0-9]+$/|unique:customer',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'contact' => 'required|string|unique:customer',
            'email' => 'required|string|unique:customer',
            'per_address' => 'required|string',
            'gender' => 'required|string',
            'blood_group' => 'required|string',
            'dob' => 'required|date', // Assuming date format for date of birth
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
{
    return [
        'emp_id.unique' => 'This employee ID is already associated with an existing entry.',
    ];
}
}
