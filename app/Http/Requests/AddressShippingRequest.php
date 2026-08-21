<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AddressShippingRequest extends FormRequest
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
           'department'=>['required','string','min:3','max:45'],
           'municipality'=>['required','string','min:3','max:45'],
           'exempt_address'=>['required','string','min:3','max:255'],

        ];
    }
    public function messages(): array
    {
        return [
            'customer_id.required' => 'El campo cliente es obligatorio.',

            'department.string' => 'El departamento solo pemite caracteres',
            'department.required' => 'El campo departamento es obligatorio.',
            'department.min' => 'El minimo de caracteres es de 3',
            'department.max' => 'El maximo de caracteres es de 45',

            'municipality.string' => 'El municipio solo pemite caracteres',
            'municipality.required' => 'El campo municipio es obligatorio.',
            'municipality.min' => 'El minimo de caracteres es de 3',
            'municipality.max' => 'El maximo de caracteres es de 45',

            'exempt_address.string' => 'La dirección solo pemite caracteres',
            'exempt_address.required' => 'El campo dirección es obligatorio.',
            'exempt_address.min' => 'El minimo de caracteres es de 3',
            'exempt_address.max' => 'El maximo de caracteres es de 255',
        ];
    }
}
