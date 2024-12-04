<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'birthday' => 'nullable|date',
            'start_date' => 'nullable|date',
            'position' => 'nullable',
            'salary' => 'nullable|integer',
            'password' => 'required|min:8',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
