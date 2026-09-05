<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <!-- Botón de regreso -->
            <a href="{{ route('categories.index') }}" class="text-gray-400 hover:text-agro-green transition p-2 bg-zinc-900 rounded-full border border-zinc-800 hover:border-agro-green">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <h2 class="font-bold text-2xl text-white leading-tight tracking-tight">
                {{ __('Detalle de Categoría') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-agro-card shadow-2xl sm:rounded-3xl border border-zinc-800 overflow-hidden relative">
                <!-- Efecto de brillo superior -->
                <div class="absolute top-0 right-0 -mt-8 -mr-8 w-48 h-48 bg-agro-green/10 rounded-full blur-3xl pointer-events-none"></div>

                <!-- Cabecera de la tarjeta (Estilo unificado) -->
                <div class="px-8 py-8 border-b border-zinc-800 flex justify-between items-center z-10 relative">
                    <div class="flex items-center gap-6">
                        <div class="flex-shrink-0 h-20 w-20 bg-zinc-900 rounded-full flex items-center justify-center border-2 border-agro-green text-3xl shadow-[0_0_15px_rgba(0,214,50,0.2)]">
                            <span class="text-agro-green font-bold">#</span>
                        </div>
                        <div>
                            <p class="text-sm text-agro-green font-semibold uppercase tracking-wider mb-1">ID: {{ str_pad($category->id, 4, '0', STR_PAD_LEFT) }}</p>
                            <h3 class="text-3xl font-bold text-white">{{ $category->name }}</h3>
                        </div>
                    </div>
                    
                    <!-- Badge de Estado -->
                    <div>
                        @if(strtolower($category->status) == 'activo')
                            <span class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-bold bg-green-500/10 text-agro-green border border-green-500/20">
                                <span class="w-2.5 h-2.5 mr-2 bg-agro-green rounded-full"></span> Activo
                            </span>
                        @else
                            <span class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-bold bg-red-500/10 text-red-500 border border-red-500/20">
                                <span class="w-2.5 h-2.5 mr-2 bg-red-500 rounded-full"></span> Inactivo
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Contenido de los detalles -->
                <div class="p-8 z-10 relative">
                    <dl class="grid grid-cols-1 gap-x-6 gap-y-8">
                        <!-- Descripción -->
                        <div class="bg-zinc-900/50 p-6 rounded-2xl border border-zinc-800/50">
                            <dt class="text-sm font-medium text-gray-400 mb-2">Descripción General</dt>
                            <dd class="text-base text-gray-300 leading-relaxed">
                                {{ $category->description ?: 'No se ha provisto una descripción.' }}
                            </dd>
                        </div>
                    </dl>
                </div>

                <!-- Botones de Acción (Footer) -->
                <div class="px-8 py-5 border-t border-zinc-800 bg-zinc-900/30 flex items-center justify-between z-10 relative">
                    <p class="text-xs text-gray-500">
                        Registrada: {{ $category->created_at ? $category->created_at->format('d/m/Y h:i A') : 'N/A' }}
                    </p>
                    
                    <div class="flex gap-4">
                        <!-- Botón Editar -->
                        <a href="{{ route('categories.edit', $category->id) }}" class="flex items-center gap-2 bg-zinc-800 text-white px-5 py-2.5 rounded-full font-bold hover:bg-zinc-700 hover:text-white border border-zinc-700 transition text-sm tracking-wider uppercase">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            Editar
                        </a>

                        <!-- Botón Eliminar (Formulario) -->
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta categoría?');">
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
