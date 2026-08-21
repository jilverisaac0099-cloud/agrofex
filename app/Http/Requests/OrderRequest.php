<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
        'customer_id' => ['required', 'integer'],
        'date_time' => ['required', 'date'],
        'total' => ['required', 'numeric'],
        'subtotal' => ['required', 'numeric'],
        'status' => ['required', 'string','min:3','max:45'],
        ];
    }
    public function messages(): array
    {
        return [
            'customer_id.required' => 'El campo cliente es obligatorio.',
            'date_time.required' => 'El campo fecha y hora es obligatorio.',
            'date_time.date' => 'El campo fecha y hora debe ser una fecha válida.',

            'total.required' => 'El campo total es obligatorio.',
            'total.numeric' => 'El campo total debe ser un número válido.',

            'subtotal.required' => 'El campo subtotal es obligatorio.',
            'subtotal.numeric' => 'El campo subtotal debe ser un número válido.',

            'status.required' => 'El campo estado es obligatorio.',
            'status.string' => 'El campo estado debe ser una cadena de texto.',
            'status.min' => 'El mínimo de caracteres para el estado es de 3.',
            'status.max' => 'El máximo de caracteres para el estado es de 45.',
        ];
    }
}

