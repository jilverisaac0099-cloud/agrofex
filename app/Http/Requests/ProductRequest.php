<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $product = $this->route('product');
        $productId = is_object($product) ? $product->id : $product;

        return [
            'name' => ['required', 'string', 'max:50'],
            'description' => ['nullable', 'string', 'max:400'],
            'price' => ['required', 'numeric', 'min:0'],
            'status' => ['required', 'string', 'in:Disponible,Agotado,disponible,agotado'],
            'producer_id' => ['required', 'integer', 'exists:producers,id'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre del producto es obligatorio.',
            'price.required' => 'El precio es obligatorio.',
            'status.required' => 'El estado es obligatorio.',
            'status.in' => 'El estado seleccionado no es válido.',
            'producer_id.required' => 'Debe seleccionar un productor.',
            'category_id.required' => 'Debe seleccionar una categoría.',
        ];
    }
}