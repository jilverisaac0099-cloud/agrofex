<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight tracking-tight">
                {{ __('Crear Nueva categoria') }}
            </h2>

<a href="{{ route('producers.index') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-800 transition-colors">
                Volver a la lista
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 p-8">

                <form action="{{ route('categories.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Nombre de la categoria </label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Ej. Juan" required
                            class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 py-3 px-4 text-gray-700">
                    </div>

                    </div>
                    <div>
                        <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Descripción</label>
                        <textarea name="description" id="description" rows="3" placeholder="Ej. Productor de granos básicos..."
                            class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 py-3 px-4 text-gray-700">{{ old('description') }}</textarea>
                    </div>


                        <label for="gender" class="block text-sm font-semibold text-gray-700 mb-2">estado</label>
                        <select name="status" id="status" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 py-3 px-4 text-gray-700">
                            <option value="">Seleccione un estado</option>
                            <option value="active" {{ old('status') == 'active' ? '' : '' }}>activado</option>
                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>inactivo</option>
                        </select>
                    </div>


                     <div class="flex items-center justify-end space-x-4 pt-4 border-t border-gray-100">
                        <a href="{{ route('producers.index') }}" class="px-6 py-3 bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-semibold rounded-xl transition-colors">
                            CANCELAR
                        </a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-lg shadow-indigo-500/30">
                            Guardar Categorias
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
