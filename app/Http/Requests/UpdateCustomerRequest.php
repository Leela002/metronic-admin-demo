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
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'contact' => 'required|string|digits:10|unique:customer,contact,' . $customerId,
            'email' => 'required|string|email|unique:customer,email,' . $customerId,
            'gender' => 'required|string',
            'blood_group' => 'required|string',
            'dob' => 'required|date|before:today',
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

        ];
    }
}
