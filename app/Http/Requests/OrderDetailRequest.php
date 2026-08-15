<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class OrderDetailRequest extends FormRequest
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
            'product_id' => ['required', 'integer'],
            'order_id' => ['required', 'integer'],
            'customer_id' => ['required', 'integer'],
            'amount' => ['required', 'numeric', 'min:0.01', 'max:999999999999.99'],
            'price' => ['required', 'numeric', 'min:0.01', 'max:999999999999.99'],
            'subtotal' => ['required', 'numeric', 'min:0.01', 'max:999999999999.99'],
        ];
    }

    public function messages(): array
    {
        return [
            'product_id.required' => 'El campo producto es obligatorio.',
            'order_id.required' => 'El campo orden es obligatorio.',
            'customer_id.required' => 'El campo cliente es obligatorio.',

            'amount.required' => 'El campo cantidad es obligatorio.',
            'amount.numeric' => 'El campo cantidad debe ser un número válido.',
            'amount.min' => 'La cantidad mínima es de 0.01.',
            'amount.max' => 'La cantidad máxima es de 999999999999.99.',

            'price.required' => 'El campo precio es obligatorio.',
            'price.numeric' => 'El campo precio debe ser un número válido.',
            'price.min' => 'El precio mínimo es de 0.01.',
            'price.max' => 'El precio máximo es de 999999999999.99.',

            'subtotal.required' => 'El campo subtotal es obligatorio.',
            'subtotal.numeric' => 'El campo subtotal debe ser un número válido.',
            'subtotal.min' => 'El subtotal mínimo es de 0.01.',
            'subtotal.max' => 'El subtotal máximo es de 999999999999.99.',
        ];
    }
}
