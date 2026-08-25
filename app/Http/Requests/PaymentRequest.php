<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'order_id' => ['required', 'integer'],
            'payment_method' => ['required', 'string', 'max:45'],
            'amount' => ['required', 'numeric', 'min:0.01', 'max:999999999999.99'],
            'status' => ['required', 'string', 'max:45'],
        ];
    }

    public function messages(): array
    {
        return [
            'order_id.required' => 'El campo orden es obligatorio.',
            'order_id.integer' => 'El campo orden debe ser un número válido.',

            'payment_method.required' => 'El campo método de pago es obligatorio.',
            'payment_method.string' => 'El campo método de pago debe ser una cadena de texto.',
            'payment_method.max' => 'El máximo de caracteres para el método de pago es de 45.',

            'amount.required' => 'El campo monto es obligatorio.',
            'amount.numeric' => 'El campo monto debe ser un número válido.',
            'amount.min' => 'El monto mínimo es de 0.01.',
            'amount.max' => 'El monto máximo es de 999999999999.99.',

            'status.required' => 'El campo estado es obligatorio.',
            'status.string' => 'El campo estado debe ser una cadena de texto.',
            'status.max' => 'El máximo de caracteres para el estado es de 45.',
        ];
    }
}
