<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'producer_id' => ['required', 'integer'],
            'category_id'=> ['required','integer'],
            'name' => ['required', 'string','min:3','max:255'],
            'description' => ['required', 'string', 'min:10','max:400'],
            'price'=>['required','numeric'],
            'status' => ['required', 'string','min:3','max:45',Rule::in(['disponible', 'agotado'])],

        ];
    }

public function messages(): array
    {
        return [
            'producer_id.required' => 'El campo productor es obligatorio.',
            'category_id.required' => 'El campo categoría es obligatorio.',

            'name.string' => 'El nombre solo pemite caracteres',
            'name.required' => 'El campo nombre es obligatorio.',
            'name.min' => 'El minimo de caracteres es de 3',
            'name.max' => 'El maximo de caracteres es de 50',

            'description.string' => 'La descripción solo pemite caracteres',
            'description.required' => 'El campo descripción es obligatorio.',
            'description.min' => 'El minimo de caracteres es de 10',
            'description.max' => 'El maximo de caracteres es de 400',

            'price.required' => 'El campo precio es obligatorio.',
            'price.numeric' => 'El campo precio debe ser un número válido.',

            'status.required'=> 'El campo estado es obligatorio.',
            'status.in' => 'El campo estado debe ser uno de los siguientes: disponible, agotado.',
            'status.string' => 'El campo estado debe ser una cadena de texto.',
        ];
    }
}
