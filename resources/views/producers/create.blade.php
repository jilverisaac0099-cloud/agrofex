<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('producers.index') }}" class="text-gray-400 hover:text-agro-green transition p-2 bg-zinc-900 rounded-full border border-zinc-800 hover:border-agro-green">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <h2 class="font-bold text-2xl text-white leading-tight tracking-tight">
                {{ __('Registrar Nuevo Productor') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-agro-card shadow-xl sm:rounded-3xl border border-zinc-800 overflow-hidden relative">
                <!-- Brillo decorativo -->
                <div class="absolute top-0 right-0 -mt-8 -mr-8 w-48 h-48 bg-agro-green/10 rounded-full blur-3xl pointer-events-none"></div>

                <form method="POST" action="{{ route('producers.store') }}" class="p-8 space-y-6 relative z-10">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nombre -->
                        <div>
                            <label for="name" class="block font-medium text-sm text-gray-300 mb-2">Nombre(s)</label>
                            <input id="name" class="block w-full bg-agro-dark border-zinc-700 text-white focus:border-agro-green focus:ring-agro-green rounded-xl shadow-sm px-4 py-3 transition-colors" type="text" name="name" value="{{ old('name') }}" required autofocus placeholder="Ej. Juan Carlos" />
                            @error('name') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Apellido -->
                        <div>
                            <label for="lastname" class="block font-medium text-sm text-gray-300 mb-2">Apellido(s)</label>
                            <input id="lastname" class="block w-full bg-agro-dark border-zinc-700 text-white focus:border-agro-green focus:ring-agro-green rounded-xl shadow-sm px-4 py-3 transition-colors" type="text" name="lastname" value="{{ old('lastname') }}" required placeholder="Ej. Pérez" />
                            @error('lastname') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Correo Electrónico -->
                        <div>
                            <label for="email" class="block font-medium text-sm text-gray-300 mb-2">Correo Electrónico</label>
                            <input id="email" class="block w-full bg-agro-dark border-zinc-700 text-white focus:border-agro-green focus:ring-agro-green rounded-xl shadow-sm px-4 py-3 transition-colors" type="email" name="email" value="{{ old('email') }}" required placeholder="ejemplo@correo.com" />
                            @error('email') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Teléfono -->
                        <div>
                            <label for="telephone" class="block font-medium text-sm text-gray-300 mb-2">Teléfono</label>
                            <input id="telephone" class="block w-full bg-agro-dark border-zinc-700 text-white focus:border-agro-green focus:ring-agro-green rounded-xl shadow-sm px-4 py-3 transition-colors" type="text" name="telephone" value="{{ old('telephone') }}" required placeholder="Ej. +505 8888 8888" />
                            @error('telephone') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Género -->
                        <div>
                            <label for="gender" class="block font-medium text-sm text-gray-300 mb-2">Género</label>
                            <select id="gender" name="gender" class="block w-full bg-agro-dark border-zinc-700 text-white focus:border-agro-green focus:ring-agro-green rounded-xl shadow-sm px-4 py-3 transition-colors" required>
                                <option value="" disabled selected class="text-gray-500">Seleccione un género</option>
                                <option value="Masculino" {{ old('gender') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                                <option value="Femenino" {{ old('gender') == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                                <option value="Otro" {{ old('gender') == 'Otro' ? 'selected' : '' }}>Otro</option>
                            </select>
                            @error('gender') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Horario -->
                        <div>
                            <label for="schedule" class="block font-medium text-sm text-gray-300 mb-2">Horario de Atención (Opcional)</label>
                            <input id="schedule" class="block w-full bg-agro-dark border-zinc-700 text-white focus:border-agro-green focus:ring-agro-green rounded-xl shadow-sm px-4 py-3 transition-colors" type="text" name="schedule" value="{{ old('schedule') }}" placeholder="Ej. Lunes a Viernes 8am - 4pm" />
                            @error('schedule') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Dirección -->
                        <div class="md:col-span-2">
                            <label for="address" class="block font-medium text-sm text-gray-300 mb-2">Dirección Completa</label>
                            <input id="address" class="block w-full bg-agro-dark border-zinc-700 text-white focus:border-agro-green focus:ring-agro-green rounded-xl shadow-sm px-4 py-3 transition-colors" type="text" name="address" value="{{ old('address') }}" required placeholder="Departamento, Municipio, Comunidad, Finca..." />
                            @error('address') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Descripción -->
                        <div class="md:col-span-2">
                            <label for="description" class="block font-medium text-sm text-gray-300 mb-2">Descripción de la Finca / Productor (Opcional)</label>
                            <textarea id="description" name="description" rows="3" class="block w-full bg-agro-dark border-zinc-700 text-white focus:border-agro-green focus:ring-agro-green rounded-xl shadow-sm px-4 py-3 transition-colors" placeholder="Detalla qué tipos de cultivos maneja, métodos (orgánico, tradicional), etc.">{{ old('description') }}</textarea>
                            @error('description') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-6 mt-10 pt-6 border-t border-zinc-800">
                        <a href="{{ route('producers.index') }}" class="text-sm text-gray-400 hover:text-white transition font-medium">Cancelar y volver</a>
                        <button type="submit" class="flex items-center gap-2 bg-agro-green text-black px-8 py-3 rounded-full font-bold hover:bg-green-500 transition shadow-[0_0_15px_rgba(0,214,50,0.3)] uppercase tracking-wider text-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Guardar Productor
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>