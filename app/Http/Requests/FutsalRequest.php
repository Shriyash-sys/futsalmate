<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FutsalRequest extends FormRequest
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
            'full_name'=> 'required|string|max:255',
            'email'=> 'required|email|max:255',
            'phone'=> 'required|string|max:15',
            'password'=> 'required|string|min:8|confirmed',
            'password.confirmed'=> 'The password confirmation does not match.',
            'terms'=> 'required',
        ];
    }
}
