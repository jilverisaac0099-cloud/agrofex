<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight tracking-tight">
                {{ __('Crear Nuevo Productor') }}
            </h2>
            <a href="{{ route('producers.index') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-800 transition-colors">
                Volver a la lista
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 p-8">
                
                @if ($errors->any())
                    <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-r-xl">
                        <p class="font-bold text-red-700">Por favor corrige los siguientes errores:</p>
                        <ul class="mt-2 list-disc list-inside text-sm text-red-600">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('producers.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Nombre del productor</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Ej. Juan" required
                            class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 py-3 px-4 text-gray-700">
                    </div>

                    <div>
                        <label for="lastname" class="block text-sm font-semibold text-gray-700 mb-2">Apellido</label>
                        <input type="text" name="lastname" id="lastname" value="{{ old('lastname') }}" placeholder="Ej. Pérez" required
                            class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 py-3 px-4 text-gray-700">
                    </div>

                    <div>
                        <label for="telephone" class="block text-sm font-semibold text-gray-700 mb-2">Teléfono</label>
                        <input type="text" name="telephone" id="telephone" value="{{ old('telephone') }}" placeholder="Ej. 88888888"
                            class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 py-3 px-4 text-gray-700">
                    </div>

                    <div>
                        <label for="gender" class="block text-sm font-semibold text-gray-700 mb-2">Género</label>
                        <select name="gender" id="gender" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 py-3 px-4 text-gray-700">
                            <option value="">Seleccione un género</option>
                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Masculino</option>
                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Femenino</option>
                            <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Otro</option>
                        </select>
                    </div>

                    <div>
                        <label for="address" class="block text-sm font-semibold text-gray-700 mb-2">Dirección</label>
                        <input type="text" name="address" id="address" value="{{ old('address') }}" placeholder="Ej. Managua, Nicaragua"
                            class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 py-3 px-4 text-gray-700">
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Descripción</label>
                        <textarea name="description" id="description" rows="3" placeholder="Ej. Productor de granos básicos..."
                            class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 py-3 px-4 text-gray-700">{{ old('description') }}</textarea>
                    </div>

                    <div>
                        <label for="schedule" class="block text-sm font-semibold text-gray-700 mb-2">Horario</label>
                        <input type="text" name="schedule" id="schedule" value="{{ old('schedule') }}" placeholder="Lunes a Viernes 8:00 - 17:00"
                            class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 py-3 px-4 text-gray-700">
                    </div>

                    <div class="flex items-center justify-end space-x-4 pt-4 border-t border-gray-100">
                        <a href="{{ route('producers.index') }}" class="px-6 py-3 bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-semibold rounded-xl transition-colors">
                            CANCELAR
                        </a>
                        <button type="submit" class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl shadow-lg shadow-indigo-500/30 transition-colors">
                            GUARDAR PRODUCTOR
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
