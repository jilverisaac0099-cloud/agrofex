<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('categories.index') }}" class="text-gray-400 hover:text-agro-green transition p-2 bg-zinc-900 rounded-full border border-zinc-800 hover:border-agro-green">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <h2 class="font-bold text-2xl text-white leading-tight tracking-tight">
                {{ __('Registrar Nueva Categoría') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-agro-card shadow-xl sm:rounded-3xl border border-zinc-800 overflow-hidden relative">
                <div class="absolute top-0 right-0 -mt-8 -mr-8 w-48 h-48 bg-agro-green/10 rounded-full blur-3xl pointer-events-none"></div>

                <form method="POST" action="{{ route('categories.store') }}" class="p-8 space-y-6 relative z-10">
                    @csrf


                    <div>
                        <label for="name" class="block font-medium text-sm text-gray-300 mb-2">Nombre de la Categoría</label>
                        <input id="name" class="block w-full bg-agro-dark border-zinc-700 text-white focus:border-agro-green focus:ring-agro-green rounded-xl shadow-sm px-4 py-3 transition-colors" type="text" name="name" value="{{ old('name') }}" required autofocus placeholder="Ej. Frutas Cítricas" />
                        @error('name') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="status" class="block font-medium text-sm text-gray-300 mb-2">Estado</label>
                        <select id="status" name="status" class="block w-full bg-agro-dark border-zinc-700 text-white focus:border-agro-green focus:ring-agro-green rounded-xl shadow-sm px-4 py-3 transition-colors" required>
                            <option value="Activo" {{ old('status') == 'Activo' ? 'selected' : '' }}>Activo</option>
                            <option value="Inactivo" {{ old('status') == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                        </select>
                        @error('status') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                    </div>

                  
                    <div>
                        <label for="description" class="block font-medium text-sm text-gray-300 mb-2">Descripción Breve</label>
                        <textarea id="description" name="description" rows="3" class="block w-full bg-agro-dark border-zinc-700 text-white focus:border-agro-green focus:ring-agro-green rounded-xl shadow-sm px-4 py-3 transition-colors" placeholder="Describe los productos que pertenecen a esta categoría..." required>{{ old('description') }}</textarea>
                        @error('description') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex items-center justify-end gap-6 mt-10 pt-6 border-t border-zinc-800">
                        <a href="{{ route('categories.index') }}" class="text-sm text-gray-400 hover:text-white transition font-medium">Cancelar</a>
                        <button type="submit" class="flex items-center gap-2 bg-agro-green text-black px-8 py-3 rounded-full font-bold hover:bg-green-500 transition shadow-[0_0_15px_rgba(0,214,50,0.3)] uppercase tracking-wider text-sm">
                            Guardar Categoría
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
