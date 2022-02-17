<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|unique:users',
            'password' => 'required|min:8|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name needs to be filled in.',
            'email.required' => 'The email needs to be filled out.',
            'email.unique' => 'There is already an account registered with this email address.',
            'password.required' => 'Password needs to be filled in.',
            'password.min' => 'Password must be at least 8 characters long.'
        ];
    }
}
