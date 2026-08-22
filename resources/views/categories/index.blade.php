<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100 leading-tight tracking-tight">
                {{ __('Crear Nueva Categoría') }}
            </h2>
            <a href="{{ route('categories.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 dark:bg-gray-700 border border-transparent rounded-xl font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest hover:bg-gray-200 dark:hover:bg-gray-600 transition ease-in-out duration-150">
                Volver a la lista
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100 dark:border-gray-700">

                <form action="{{ route('categories.store') }}" method="POST" class="p-6 sm:p-8">
                    @csrf

                    <div class="space-y-6">
                        
                        <div>
                            <label for="name" class="block text-sm text-gray-700 dark:text-gray-300 mb-2">Nombre de la categoría</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full rounded-lg border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" placeholder="Ej. Lácteos" required>
                            @error('name')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="description" class="block text-sm text-gray-700 dark:text-gray-300 mb-2">Descripción (Opcional)</label>
                            <textarea name="description" id="description" rows="3" class="w-full rounded-lg border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" placeholder="Ej. Productos derivados de la leche...">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="status" class="block text-sm text-gray-700 dark:text-gray-300 mb-2">Estado</label>
                            <select name="status" id="status" class="w-full rounded-lg border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" required>
                                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Activo</option>
                                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactivo</option>
                            </select>
                            @error('status')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="mt-10 flex justify-end items-center space-x-4">
                        <a href="{{ route('categories.index') }}" class="px-4 py-2 text-sm font-semibold text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white tracking-widest uppercase transition-colors">
                            Cancelar
                        </a>
                        <button type="submit" class="px-6 py-2.5 bg-indigo-600 border border-transparent rounded-lg font-bold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors">
                            Guardar Categoría
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
