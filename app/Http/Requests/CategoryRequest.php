<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use illuminate\validation\Rule;

class CategoryRequest extends FormRequest
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
            'description' => ['required', 'string', 'max:400'],
            'status' => ['string', Rule:: in(['active', 'inactive'])],
        ];
    }


public function messages(): array
    {
        return [
            'name.string' => 'El nombre solo pemite caracteres',
            'name.required' => 'El campo nombre es obligatorio.',
            'name.min' => 'El minimo de caracteres es de 3',
            'name.max' => 'El maximo de caracteres es de 50',

            'description.string' => 'La descripción solo pemite caracteres',
            'description.required' => 'El campo descripción es obligatorio.',
            'description.min' => 'El minimo de caracteres es de 3',
            'description.max' => 'El maximo de caracteres es de 400',

            'status.required'=> 'El campo estado es obligatorio.',
            'status.in' => 'El campo estado debe ser uno de los siguientes: activo, inactivo.',
            'status.string' => 'El campo estado debe ser una cadena de texto.',
        ];
    }
}