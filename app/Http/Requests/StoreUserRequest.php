<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'name' => 'required|max:255|unique:users,id,'.$this->id,
            'email' => 'required|max:1000',
        ];

        if ($this->filled('password')) {
            $rules['password'] = 'required|min:8|confirmed';
        }

        return $rules;
    }

    protected function prepareForValidation()
    {
        // If password is provided, hash it
        if ($this->filled('password')) {
            $this->merge([
                'password' => Hash::make($this->password),
            ]);
        }
    }
}
