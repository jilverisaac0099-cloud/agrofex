<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use App\Models\Category; // <-- Usamos Categorías
use App\Models\Producer;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index()
    {
        // ARREGLADO: Cargamos 'category' (NO customer)
        $products = Product::with(['category', 'producer'])->latest()->paginate(10);

        return view('products.index', compact('products'));
    }

    public function create(): View
    {
        $product = new Product();
        $categories = Category::all();
        $producers = Producer::all();
        
        return view('products.create', compact('product', 'producers', 'categories'));
    }

    public function store(ProductRequest $request)
    {
        Product::create($request->validated());
        
        return redirect()->route('products.index')->with('success', 'Producto creado correctamente.');
    }

    public function show(Product $product)
    {
        // ARREGLADO: Cargamos 'category' (NO customer)
        $product->load(['category', 'producer']);
        
        return view('products.show', compact('product'));
    }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        
        // ARREGLADO: Buscamos Categories (NO Customers)
        $categories = Category::all();
        $producers = Producer::all();
        
        // ARREGLADO: Pasamos 'categories' a la vista
        return view('products.edit', compact('product', 'categories', 'producers'));
    }

    public function update(ProductRequest $request, string $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->validated());
        
        return redirect()->route('products.index')->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy(string $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $product->delete();
        
        return redirect()->route('products.index')->with('success', 'Producto eliminado correctamente.');
    }
}

