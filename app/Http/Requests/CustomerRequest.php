<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'min:3', 'max:255'],
            'telephone' => ['required', 'string', 'min:7', 'max:20'],
            'email' => ['required', 'string', 'email','min:3' ,'max:255', Rule::unique('customers')->ignore($this->customer)],
            'gender' => ['required','string','min:3','max:20',Rule:: in(['male', 'female', 'other'])],
            'birth_date' => ['nullable','string','min:3','max:20','date'],
            'registration_date' => ['nullable','min:3','max:20','date'],
        ];
    }


public function messages(): array
    {
        return [
            'name.string' => 'El nombre solo pemite caracteres',
            'name.required' => 'El campo nombre es obligatorio.',
            'name.min' => 'El minimo de caracteres es de 3',
            'name.max' => 'El maximo de caracteres es de 50',

            'last_name.string' => 'El apellido solo pemite caracteres',
            'last_name.required' => 'El campo apellido es obligatorio.',
            'last_name.min' => 'El minimo de caracteres es de 3',
            'last_name.max' => 'El maximo de caracteres es de 50',

            'telephone.integer' => 'El campo teléfono debe ser un número entero.',
            'telephone.required' => 'El campo teléfono es obligatorio.',
            'telephone.min' => 'El minimo de caracteres es de 7',
            'telephone.max' => 'El maximo de caracteres es de 15',

            'email.string' => 'El correo electrónico solo pemite caracteres',
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser una dirección válida.',
            'email.min' => 'El minimo de caracteres es de 3',
            'email.max' => 'El maximo de caracteres es de 100',

            'gender.required'=> 'El campo género es obligatorio.',
            'gender.in' => 'El campo género debe ser uno de los siguientes: mujer, hombre, otro.',
            'gender.string' => 'El campo género debe ser una cadena de texto.',
            'gender.min' => 'El minimo de caracteres es de 3',
            'gender.max' => 'El maximo de caracteres es de 20',

            'birth_date.string' => 'El campo fecha de nacimiento debe ser una cadena de texto.',
            'birth_date.date' => 'El campo fecha de nacimiento debe ser una fecha válida.',
            'birth_date.min' => 'El minimo de caracteres es de 3',
            'birth_date.max' => 'El maximo de caracteres es de 20',

            'registration_date.string' => 'El campo fecha de registro debe ser una cadena de texto.',
            'registration_date.date' => 'El campo fecha de registro debe ser una fecha válida.',
            'registration_date.min' => 'El minimo de caracteres es de 3',
            'registration_date.max' => 'El maximo de caracteres es de 20',
        ];
    }
}
