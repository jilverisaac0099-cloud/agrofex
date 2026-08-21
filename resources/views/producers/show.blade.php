<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight tracking-tight">
                {{ __('Detalles del Productor') }}
            </h2>
            <a href="{{ route('producers.index') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-800 transition-colors">
                Volver a la lista
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 p-8">
                
                <div class="border-b border-gray-200 pb-6 mb-6">
                    <h3 class="text-2xl font-bold text-gray-900">{{ $producer->name }} {{ $producer->lastname }}</h3>
                    <p class="text-sm text-gray-500 mt-1">Información completa del productor.</p>
                </div>

                <dl class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-8">
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-1">Nombre</dt>
                        <dd class="text-base font-medium text-gray-900">{{ $producer->name }}</dd>
                    </div>

                    <div class="sm:col-span-1">
                        <dt class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-1">Apellido</dt>
                        <dd class="text-base font-medium text-gray-900">{{ $producer->lastname }}</dd>
                    </div>

                    <div class="sm:col-span-1">
                        <dt class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-1">Correo electrónico</dt>
                        <dd class="text-base font-medium text-gray-900">{{ $producer->email ?? 'No registrado' }}</dd>
                    </div>

                    <div class="sm:col-span-1">
                        <dt class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-1">Teléfono</dt>
                        <dd class="text-base font-medium text-gray-900">{{ $producer->telephone ?? 'No registrado' }}</dd>
                    </div>

                    <div class="sm:col-span-1">
                        <dt class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-1">Género</dt>
                        <dd class="text-base font-medium text-gray-900">
                            @if($producer->gender == 'male')
                                Masculino
                            @elseif($producer->gender == 'female')
                                Femenino
                            @elseif($producer->gender == 'other')
                                Otro
                            @else
                                No registrado
                            @endif
                        </dd>
                    </div>

                    <div class="sm:col-span-1">
                        <dt class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-1">Horario</dt>
                        <dd class="text-base font-medium text-gray-900">{{ $producer->schedule ?? 'No registrado' }}</dd>
                    </div>

                    <div class="sm:col-span-2">
                        <dt class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-1">Dirección</dt>
                        <dd class="text-base font-medium text-gray-900">{{ $producer->address ?? 'No registrada' }}</dd>
                    </div>

                    <div class="sm:col-span-2">
                        <dt class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-1">Descripción</dt>
                        <dd class="text-base font-medium text-gray-900 bg-gray-50 p-4 rounded-xl mt-1 border border-gray-100">
                            {{ $producer->description ?? 'Sin descripción' }}
                        </dd>
                    </div>
                </dl>

                <div class="flex items-center justify-end space-x-4 pt-8 mt-8 border-t border-gray-100">
                    <a href="{{ route('producers.index') }}" class="px-6 py-3 bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-semibold rounded-xl transition-colors">
                        VOLVER
                    </a>
                    <a href="{{ route('producers.edit', $producer) }}" class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl shadow-lg shadow-indigo-500/30 transition-colors">
                        EDITAR PRODUCTOR
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

