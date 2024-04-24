<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rules;

class CreateUserRequest extends FormRequest
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
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => [
                'required',
                'min:6',
                'confirmed',
                Rules\Password::defaults(),
            ],
            'role' => 'required|string|max:5',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre y apellido es obligatorio.',
            'name.max' => 'El nombre y appelido no puede contener mas de 50 caracteres.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.unique' => 'Ya hay una cuenta registrada con este correo electrónico.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'role.required' => 'El rol es obligatorio.',
            'role.string' => 'El rol debe ser caracter.',
            'role.max' => 'El rol debe ser máximo cinco caracteres.',
        ];
    }
}
