<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('producers.index') }}" class="text-gray-400 hover:text-agro-green transition p-2 bg-zinc-900 rounded-full border border-zinc-800 hover:border-agro-green">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <h2 class="font-bold text-2xl text-white leading-tight tracking-tight">
                {{ __('Ficha del Productor') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-agro-card shadow-2xl sm:rounded-3xl border border-zinc-800 overflow-hidden relative">
                <!-- Brillo -->
                <div class="absolute top-0 right-0 -mt-8 -mr-8 w-48 h-48 bg-agro-green/10 rounded-full blur-3xl pointer-events-none"></div>

                <!-- Cabecera de la tarjeta -->
                <div class="px-8 py-8 border-b border-zinc-800 flex items-center gap-6 z-10 relative">
                    <div class="flex-shrink-0 h-20 w-20 bg-zinc-900 rounded-full flex items-center justify-center border-2 border-agro-green text-3xl shadow-[0_0_15px_rgba(0,214,50,0.2)]">
                        <span class="text-agro-green font-bold">{{ substr($producer->name, 0, 1) }}{{ substr($producer->lastname, 0, 1) }}</span>
                    </div>
                    <div>
                        <h3 class="text-3xl font-bold text-white mb-1">{{ $producer->name }} {{ $producer->lastname }}</h3>
                        <p class="text-sm text-gray-400 font-medium tracking-wide">ID Productor: #{{ str_pad($producer->id, 5, '0', STR_PAD_LEFT) }}</p>
                    </div>
                </div>

                <!-- Contenido de los detalles -->
                <div class="p-8 z-10 relative">
                    <dl class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                        
                        <!-- Info de Contacto -->
                        <div class="bg-zinc-900/50 p-5 rounded-2xl border border-zinc-800/50 space-y-4">
                            <h4 class="text-agro-green font-semibold uppercase tracking-wider text-xs border-b border-zinc-800 pb-2">Información de Contacto</h4>
                            
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Correo Electrónico</dt>
                                <dd class="mt-1 text-base text-white flex items-center gap-2">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                    {{ $producer->email }}
                                </dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Teléfono</dt>
                                <dd class="mt-1 text-base text-white flex items-center gap-2">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                    {{ $producer->telephone }}
                                </dd>
                            </div>
                        </div>

                        <!-- Info Operativa -->
                        <div class="bg-zinc-900/50 p-5 rounded-2xl border border-zinc-800/50 space-y-4">
                            <h4 class="text-agro-green font-semibold uppercase tracking-wider text-xs border-b border-zinc-800 pb-2">Información Operativa</h4>
                            
                            <div class="flex justify-between">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Género</dt>
                                    <dd class="mt-1 text-base text-white">{{ $producer->gender }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Horario</dt>
                                    <dd class="mt-1 text-base text-white">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-zinc-800 text-gray-300 border border-zinc-700">
                                            {{ $producer->schedule ?? 'N/A' }}
                                        </span>
                                    </dd>
                                </div>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Ubicación / Finca</dt>
                                <dd class="mt-1 text-base text-gray-300">{{ $producer->address }}</dd>
                            </div>
                        </div>

                        <!-- Descripción Completa -->
                        <div class="md:col-span-2 bg-zinc-900/50 p-6 rounded-2xl border border-zinc-800/50">
                            <dt class="text-sm font-medium text-gray-500 mb-2">Descripción del Productor</dt>
                            <dd class="text-base text-gray-300 leading-relaxed">
                                {{ $producer->description ?: 'Este productor no ha añadido una descripción de su finca o métodos de trabajo.' }}
                            </dd>
                        </div>
                    </dl>
                </div>

                <!-- Botones de Acción (Footer) -->
                <div class="px-8 py-5 border-t border-zinc-800 bg-zinc-900/30 flex items-center justify-between z-10 relative">
                    <p class="text-xs text-gray-500">
                        Registrado el: {{ $producer->created_at ? $producer->created_at->format('d/m/Y h:i A') : 'N/A' }}
                    </p>
                    
                    <div class="flex gap-4">
                        <a href="{{ route('producers.edit', $producer->id) }}" class="flex items-center gap-2 bg-zinc-800 text-white px-5 py-2.5 rounded-full font-bold hover:bg-zinc-700 hover:text-white border border-zinc-700 transition text-sm tracking-wider uppercase">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            Editar
                        </a>

                        <form action="{{ route('producers.destroy', $producer->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este productor? Los productos asociados se eliminarán.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="flex items-center gap-2 bg-red-500/10 text-red-500 px-5 py-2.5 rounded-full font-bold hover:bg-red-500 hover:text-white border border-red-500/20 transition text-sm tracking-wider uppercase">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout> 