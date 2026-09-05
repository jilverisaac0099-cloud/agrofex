<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-white leading-tight tracking-tight">
                Detalles del Productor <span class="text-agro-green">#{{ $producer->id }}</span>
            </h2>
            <div class="flex items-center gap-3">
                <a href="{{ route('producers.edit', $producer->id) }}" class="flex items-center gap-2 bg-blue-600/20 text-blue-400 px-5 py-2 rounded-full font-bold hover:bg-blue-600 hover:text-white border border-blue-500/30 transition text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    Editar
                </a>
                <a href="{{ route('producers.index') }}" class="flex items-center gap-2 bg-zinc-800 text-gray-300 px-5 py-2 rounded-full font-bold hover:bg-zinc-700 hover:text-white border border-zinc-700 transition text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Volver a la lista
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-agro-card shadow-2xl sm:rounded-3xl border border-zinc-800 overflow-hidden relative p-8 space-y-6">
                <div class="absolute top-0 right-0 -mt-8 -mr-8 w-48 h-48 bg-agro-green/10 rounded-full blur-3xl pointer-events-none"></div>

                <div class="flex justify-between items-start border-b border-zinc-800 pb-6">
                    <div>
                        <span class="text-xs font-bold text-gray-500 uppercase tracking-wider">ID PRODUCTOR: #{{ $producer->id }}</span>
                        <h3 class="text-3xl font-extrabold text-white mt-1">{{ $producer->name }} {{ $producer->lastname }}</h3>
                    </div>
                    <span class="px-4 py-1.5 rounded-full text-sm font-bold bg-agro-green/10 text-agro-green border border-agro-green/25">
                        {{ $producer->gender }}
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-zinc-900/50 p-5 rounded-2xl border border-zinc-800/80">
                        <span class="text-xs font-bold text-gray-500 uppercase tracking-wider block mb-1">Correo Electrónico</span>
                        <p class="text-base font-semibold text-white">{{ $producer->email }}</p>
                    </div>

                    <div class="bg-zinc-900/50 p-5 rounded-2xl border border-zinc-800/80">
                        <span class="text-xs font-bold text-gray-500 uppercase tracking-wider block mb-1">Teléfono</span>
                        <p class="text-base font-semibold text-white">{{ $producer->telephone }}</p>
                    </div>

                    <div class="bg-zinc-900/50 p-5 rounded-2xl border border-zinc-800/80">
                        <span class="text-xs font-bold text-gray-500 uppercase tracking-wider block mb-1">Horario de Atención</span>
                        <p class="text-base font-semibold text-white">{{ $producer->schedule ?? 'No especificado' }}</p>
                    </div>

                    <div class="bg-zinc-900/50 p-5 rounded-2xl border border-zinc-800/80">
                        <span class="text-xs font-bold text-gray-500 uppercase tracking-wider block mb-1">Dirección Completa</span>
                        <p class="text-base font-semibold text-white">{{ $producer->address }}</p>
                    </div>
                </div>

                <div class="bg-zinc-900/50 p-5 rounded-2xl border border-zinc-800/80">
                    <span class="text-xs font-bold text-gray-500 uppercase tracking-wider block mb-1">Descripción de la Finca / Productor</span>
                    <p class="text-base text-gray-300 mt-1">{{ $producer->description ?? 'Sin descripción adicional.' }}</p>
                </div>

                <div class="flex items-center justify-between pt-6 border-t border-zinc-800">
                    <form action="{{ route('producers.destroy', $producer->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este productor?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-400 font-bold text-sm tracking-wider uppercase transition">
                            Eliminar Productor
                        </button>
                    </form>
                    <a href="{{ route('producers.index') }}" class="text-gray-400 hover:text-white font-bold text-sm tracking-wider uppercase transition">
                        VOLVER
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>