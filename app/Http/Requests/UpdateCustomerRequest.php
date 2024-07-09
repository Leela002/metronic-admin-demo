<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateCustomerRequest extends FormRequest
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
     * @return array<string,>
     */
    public function rules(): array
    {
        $customerId = $this->route('id')->id;

        return [
            'emp_id' => 'required|string|regex:/^(?=.*[a-zA-Z])(?=.*[0-9])[a-zA-Z0-9]+$/',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'contact' => 'required|string|unique:customer,contact,' . $customerId,
            'email' => 'required|string|unique:customer,email,' . $customerId,
            'per_address' => 'required|string',
            'gender' => 'required|string',
            'blood_group' => 'required|string',
            'dob' => 'required|date',
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
