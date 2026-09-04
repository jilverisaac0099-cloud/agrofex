<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('producers.index') }}" class="text-gray-400 hover:text-agro-green transition p-2 bg-zinc-900 rounded-full border border-zinc-800 hover:border-agro-green">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <h2 class="font-bold text-2xl text-white leading-tight tracking-tight">
                {{ __('Editar Productor') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-agro-card shadow-xl sm:rounded-3xl border border-zinc-800 overflow-hidden relative">
                <div class="absolute top-0 right-0 -mt-8 -mr-8 w-48 h-48 bg-agro-green/10 rounded-full blur-3xl pointer-events-none"></div>

                <form method="POST" action="{{ route('producers.update', $producer->id) }}" class="p-8 space-y-6 relative z-10">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block font-medium text-sm text-gray-300 mb-2">Nombre(s)</label>
                            <input id="name" class="block w-full bg-agro-dark border-zinc-700 text-white focus:border-agro-green focus:ring-agro-green rounded-xl shadow-sm px-4 py-3 transition-colors" type="text" name="name" value="{{ old('name', $producer->name) }}" required autofocus />
                            @error('name') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="lastname" class="block font-medium text-sm text-gray-300 mb-2">Apellido(s)</label>
                            <input id="lastname" class="block w-full bg-agro-dark border-zinc-700 text-white focus:border-agro-green focus:ring-agro-green rounded-xl shadow-sm px-4 py-3 transition-colors" type="text" name="lastname" value="{{ old('lastname', $producer->lastname) }}" required />
                            @error('lastname') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="email" class="block font-medium text-sm text-gray-300 mb-2">Correo Electrónico</label>
                            <input id="email" class="block w-full bg-agro-dark border-zinc-700 text-white focus:border-agro-green focus:ring-agro-green rounded-xl shadow-sm px-4 py-3 transition-colors" type="email" name="email" value="{{ old('email', $producer->email) }}" required />
                            @error('email') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="telephone" class="block font-medium text-sm text-gray-300 mb-2">Teléfono</label>
                            <input id="telephone" class="block w-full bg-agro-dark border-zinc-700 text-white focus:border-agro-green focus:ring-agro-green rounded-xl shadow-sm px-4 py-3 transition-colors" type="text" name="telephone" value="{{ old('telephone', $producer->telephone) }}" required />
                            @error('telephone') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        !-- Género -->
<div>
    <label for="genero" class="block font-medium text-sm text-gray-300 mb-2">Género</label>
    <select id="genero" name="genero" class="block w-full bg-agro-dark border-zinc-700 text-white focus:border-agro-green focus:ring-agro-green rounded-xl shadow-sm px-4 py-3 transition-colors" required>
        <option value="" disabled {{ old('genero') ? '' : 'selected' }} class="text-gray-500">Seleccione un género</option>
        <option value="masculino" {{ old('genero') == 'masculino' ? 'selected' : '' }}>Masculino</option>
        <option value="femenino" {{ old('genero') == 'femenino' ? 'selected' : '' }}>Femenino</option>
        <option value="otro" {{ old('genero') == 'otro' ? 'selected' : '' }}>Otro</option>
    </select>
    @error('genero') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
</div>
                        <div>
                            <label for="schedule" class="block font-medium text-sm text-gray-300 mb-2">Horario de Atención</label>
                            <input id="schedule" class="block w-full bg-agro-dark border-zinc-700 text-white focus:border-agro-green focus:ring-agro-green rounded-xl shadow-sm px-4 py-3 transition-colors" type="text" name="schedule" value="{{ old('schedule', $producer->schedule) }}" />
                            @error('schedule') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label for="address" class="block font-medium text-sm text-gray-300 mb-2">Dirección Completa</label>
                            <input id="address" class="block w-full bg-agro-dark border-zinc-700 text-white focus:border-agro-green focus:ring-agro-green rounded-xl shadow-sm px-4 py-3 transition-colors" type="text" name="address" value="{{ old('address', $producer->address) }}" required />
                            @error('address') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label for="description" class="block font-medium text-sm text-gray-300 mb-2">Descripción</label>
                            <textarea id="description" name="description" rows="3" class="block w-full bg-agro-dark border-zinc-700 text-white focus:border-agro-green focus:ring-agro-green rounded-xl shadow-sm px-4 py-3 transition-colors">{{ old('description', $producer->description) }}</textarea>
                            @error('description') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-6 mt-10 pt-6 border-t border-zinc-800">
                        <a href="{{ route('producers.index') }}" class="text-sm text-gray-400 hover:text-white transition font-medium">Cancelar y volver</a>
                        <button type="submit" class="flex items-center gap-2 bg-agro-green text-black px-8 py-3 rounded-full font-bold hover:bg-green-500 transition shadow-[0_0_15px_rgba(0,214,50,0.3)] uppercase tracking-wider text-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                            Actualizar Datos
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>