<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            
            'name' => 'required|string|max:200|min:5',
            'email' => 'required|email|unique:users',
            'phone_number' => [
                'required',
                'numeric',
                'unique:users',
                'regex:/^(010|011|012|015)\d{8}$/'
            ],
            'address' => 'required|string|max:200|min:5',
            'password' => 'required|min:8|confirmed'
        ];
    }
}
