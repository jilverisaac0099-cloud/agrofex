<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

   
    public function rules(): array
    {
                $userId = $this->route('user') ? $this->route('user')->id : null;

        return [ 'name' => [ 'required', 'string','min:2','max:255',],
            'email' => ['required','string','email','max:255',
                Rule::unique('users', 'email')->ignore($userId),
            ],

            'password' => [ $this->isMethod('post') ? 'required' : 'nullable', 'confirmed', Password::defaults() ],
            'role' => ['nullable', 'string', Rule::in(['admin', 'client', 'producer'])],
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'El nombre del usuario es obligatorio.',
            'name.max' => 'El nombre no puede exceder los 255 caracteres.',
            
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Debe ingresar un correo electrónico válido.',
            'email.unique' => 'Este correo electrónico ya está registrado por otro usuario.',
            
            'password.required' => 'La contraseña es obligatoria.',
            'password.confirmed'=> 'Las contraseñas no coinciden.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            
            'role.in' => 'El rol seleccionado no es válido.',
        ];
    }
}
