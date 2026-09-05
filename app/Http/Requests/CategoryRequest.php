<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        if ($this->has('status')) {
            $this->merge([
                'status' => strtolower($this->status),
            ]);
        }
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:400'],
            'status' => ['required', 'string', 'in:activo,inactivo'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.string' => 'El nombre solo permite caracteres.',
            'name.required' => 'El campo nombre es obligatorio.',
            'name.max' => 'El máximo de caracteres es de 255.',
            'description.string' => 'La descripción solo permite caracteres.',
            'description.max' => 'El máximo de caracteres es de 400.',
            'status.required' => 'El campo estado es obligatorio.',
            'status.in' => 'El campo estado debe ser uno de los siguientes: activo, inactivo.',
            'status.string' => 'El campo estado debe ser una cadena de texto.',
        ];
    }
}
