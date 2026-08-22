<x-app-layout>
    <x-slot name="header">
          <div class="flex items-center justify-between">
        <h2 class="font-semibold text-2x1 text-gray-800 leading-tight tracking-tight">
            {{ __('Crear Nuevo Productos') }}
            </h2>
            <a href="{{ route('products.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 dark:bg-gray-700 border border-transparent rounded-xl font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest hover:bg-gray-200 dark:hover:bg-gray-600 transition ease-in-out duration-150">
                Volver a la lista
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100 dark:border-gray-700">
                
                <form action="{{ route('products.store') }}" method="POST" class="p-6 sm:p-8">
                    @csrf


                    <div class="space-y-6">
                        <div>
                            <label for="name" class="block text-sm text-gray-700 dark:text-gray-300 mb-2">Nombre del producto</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full rounded-lg border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" placeholder="Ej. Café orgánico" required>
                            @error('name')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>


                        <div>
                            <label for="price" class="block text-sm text-gray-700 dark:text-gray-300 mb-2">Precio (C$)</label>
                            <input type="number" step="0.01" min="0" name="price" id="price" value="{{ old('price') }}" class="w-full rounded-lg border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" placeholder="Ej. 150.00" required>
                            @error('price')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>


                        <div>
                            <label for="status" class="block text-sm text-gray-700 dark:text-gray-300 mb-2">Estado</label>
                            <select name="status" id="status" class="w-full rounded-lg border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" required>
                                <option value="">Seleccione un estado</option>
                                <option value="available" {{ old('status') == 'available' ? 'selected' :'' }}>disponible</option>
                                <option value="exhausted" {{ old('status') == 'exhausted' ? 'selected' :'' }}>agotado</option>
                            </select>
                            @error('status')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>


                        <div>
                            <label for="category_id" class="block text-sm text-gray-700 dark:text-gray-300 mb-2">Categoría</label>
                            <select name="category_id" id="category_id" class="w-full rounded-lg border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" required>
                                <option value="">Seleccione una categoría</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        
                        <div>
                            <label for="producer_id" class="block text-sm text-gray-700 dark:text-gray-300 mb-2">Productor</label>
                            <select name="producer_id" id="producer_id" class="w-full rounded-lg border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" required>
                                <option value="">Seleccione un productor</option>
                                @foreach($producers as $producer)
                                    <option value="{{ $producer->id }}" {{ old('producer_id') == $producer->id ? 'selected' : '' }}>
                                        {{ $producer->name }} {{ $producer->lastname ?? '' }}
                                    </option>
                                @endforeach
                            </select>
                            @error('producer_id')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

        
                        <div>
                            <label for="description" class="block text-sm text-gray-700 dark:text-gray-300 mb-2">Descripción</label>
                            <textarea name="description" id="description" rows="4" class="w-full rounded-lg border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" placeholder="Ej. Detalles del producto...">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="mt-10 flex justify-end items-center space-x-4">
                        <a href="{{ route('products.index') }}" class="px-4 py-2 text-sm font-semibold text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white tracking-widest uppercase transition-colors">
                            Cancelar
                        </a>
                        <button type="submit" class="px-6 py-2.5 bg-indigo-600 border border-transparent rounded-lg font-bold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors">
                            Guardar Producto
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>

