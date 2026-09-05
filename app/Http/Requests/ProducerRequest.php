<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProducerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $producer = $this->route('producer') ?? $this->route('producers');
        $producerId = is_object($producer) ? $producer->id : $producer;

        return [
            'name' => ['required', 'string', 'max:50'],
            'lastname' => ['required', 'string', 'max:45'],
            'gender' => ['required', 'string', 'max:20', 'in:Masculino,Femenino,Otro'],
            'telephone' => ['required', 'string', 'max:45', 'unique:producers,telephone,' . $producerId],
            'email' => ['required', 'email', 'max:100', 'unique:producers,email,' . $producerId],
            'address' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:400'],
            'schedule' => ['nullable', 'string', 'max:45'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El campo nombre es obligatorio.',
            'lastname.required' => 'El campo apellido es obligatorio.',
            'gender.required' => 'El campo género es obligatorio.',
            'gender.in' => 'El género seleccionado no es válido.',
            'telephone.required' => 'El teléfono es obligatorio.',
            'telephone.unique' => 'Este teléfono ya está registrado.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Debe ingresar un correo válido.',
            'email.unique' => 'Este correo electrónico ya está registrado.',
            'address.required' => 'La dirección es obligatoria.',
        ];
    }
}