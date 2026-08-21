<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'producer_id' => ['required', 'integer'],
            'customer_id' => ['required', 'integer'],
            'text' => ['required', 'string', 'min:3', 'max:400'],
            'qualification' => ['required', 'numeric', 'min:1', 'max:5'],
        ];
    }

public function messages(): array
    {
        return [
            'product_id.required' => 'El campo producto es obligatorio.',
            'producer_id.required' => 'El campo productor es obligatorio.',
            'customer_id.required' => 'El campo cliente es obligatorio.',

            'text.string' => 'El comentario solo pemite caracteres',
            'text.required' => 'El campo comentario es obligatorio.',
            'text.min' => 'El minimo de caracteres es de 3',
            'text.max' => 'El maximo de caracteres es de 400',

            'qualification.required' => 'El campo calificación es obligatorio.',
            'qualification.numeric' => 'El campo calificación debe ser un número.',
            'qualification.min' => 'La calificación mínima es de 1.',
            'qualification.max' => 'La calificación máxima es de 5.',
        ];
    }

}
