<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProducerRequest extends FormRequest
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
            'lastname' => ['required', 'string', 'min:3', 'max:255'],
            'gender' => ['required','min:3','max:20',Rule::in(['male', 'female', 'other'])],
            'telephone' => ['required', 'string','min:7', 'max:20'],
            'email' => ['required', 'string', 'email','min:3' ,'max:255', Rule::unique('producers')->ignore($this->producer)],
            'address' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string' , 'min:3', 'max:400'],
            'schedule' => ['required', 'string' , 'min:3','max:45'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.string' => 'El nombre solo pemite caracteres',
            'name.required' => 'El campo nombre es obligatorio.',
            'name.min' => 'El minimo de caracteres es de 3',
            'name.max' => 'El maximo de caracteres es de 50',

            'lastname.string' => 'El apellido solo pemite caracteres',
            'lastname.required' => 'El campo apellido es obligatorio.',
            'lastname.min' => 'El minimo de caracteres es de 3',
            'lastname.max' => 'El maximo de caracteres es de 50',

            'gender.required'=> 'El campo género es obligatorio.',
            'gender.in' => 'El campo género debe ser uno de los siguientes: masculino, hombre, otro.',
            'gender.string' => 'El campo género debe ser una cadena de texto.',
            'gender.min' => 'El minimo de caracteres es de 3',
            'gender.max' => 'El maximo de caracteres es de 20',

            'telephone.integer' => 'El campo teléfono debe ser un número entero.',
            'telephone.required' => 'El campo teléfono es obligatorio.',
            'telephone.min' => 'El minimo de caracteres es de 7',
            'telephone.max' => 'El maximo de caracteres es de 15',

            'email.string' => 'El correo electrónico solo pemite caracteres',
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser una dirección válida.',
            'email.min' => 'El minimo de caracteres es de 3',
            'email.max' => 'El maximo de caracteres es de 100',

            'address.string' => 'La dirección solo pemite caracteres',
            'address.required' => 'El campo dirección es obligatorio.',
            'address.min' => 'El minimo de caracteres es de 3',
            'address.max' => 'El maximo de caracteres es de 255',

            'description.string' => 'La descripción solo pemite caracteres',
            'description.required' => 'El campo descripción es obligatorio.',
            'description.min' => 'El minimo de caracteres es de 3',
            'description.max' => 'El maximo de caracteres es de 400',

            'schedule.string' => 'El horario solo pemite caracteres',
            'schedule.required' => 'El campo horario es obligatorio.',
            'schedule.min' => 'El minimo de caracteres es de 3',
            'schedule.max' => 'El maximo de caracteres es de 45',
        ];
    }
}
