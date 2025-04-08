<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class RegisterRequest extends FormRequest
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
            'full_name' => ['required', 'string'],
            'email' => 'required|email',
            'phone_number' => ['required', 'string'],
            'address' => ['required', 'string'],
            'access_code' => ['required', 'string'],   //Rule::exists('access_code', 'code')
            'password' => ['required', 'string', 'min:8'],
            'role' => 'nullable|string|in:user,admin',
        ];
    }


    public function wantsJson()
{
    return true; // Force JSON response
}


}
