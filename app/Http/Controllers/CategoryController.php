<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {

        $categories = Category::withCount('products')->orderByDesc('id')->paginate(10);
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        $category = new Category();
        return view('categories.create', compact('category'));
    }

public function store( Categoryrequest $request)
    {
        Category::create($request->validated());
        return redirect()->route('categories.index')->with('success', 'Categoría creada exitosamente.');
    }



    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        return redirect()->route('categories.index')->with('success', 'Categoría actualizada exitosamente.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Categoría eliminada del sistema.');
    }
}
