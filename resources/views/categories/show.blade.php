<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100 leading-tight tracking-tight">
                {{ __('Detalles de la Categoría') }}
            </h2>
            <div class="flex space-x-3">
                <a href="{{ route('categories.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 dark:bg-gray-700 border border-transparent rounded-xl font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest hover:bg-gray-200 dark:hover:bg-gray-600 transition ease-in-out duration-150">
                    Volver a la lista
                </a>
                <a href="{{ route('categories.edit', $category) }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-xl font-bold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors">
                    Editar Categoría
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100 dark:border-gray-700">
                
                <div class="p-6 sm:p-8">
                    <div class="px-4 sm:px-0 mb-6">
                        <h3 class="text-lg font-semibold leading-7 text-gray-900 dark:text-white">Información General</h3>
                        <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500 dark:text-gray-400">Datos detallados de la categoría seleccionada.</p>
                    </div>
                    
                    <div class="mt-6 border-t border-gray-100 dark:border-gray-700">
                        <dl class="divide-y divide-gray-100 dark:divide-gray-700">
                            
                            <!-- Nombre -->
                            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-gray-300">Nombre de la categoría</dt>
                                <dd class="mt-1 text-sm leading-6 text-gray-700 dark:text-gray-400 sm:col-span-2 sm:mt-0">
                                    {{ $category->name }}
                                </dd>
                            </div>

                            <!-- Estado -->
                            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-gray-300">Estado</dt>
                                <dd class="mt-1 text-sm leading-6 text-gray-700 dark:text-gray-400 sm:col-span-2 sm:mt-0">

                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium border {{ $statusClasses }}">
                                        {{ $statusText }}
                                    </span>
                                </dd>
                            </div>

                            <!-- Descripción -->
                            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-gray-300">Descripción</dt>
                                <dd class="mt-1 text-sm leading-6 text-gray-700 dark:text-gray-400 sm:col-span-2 sm:mt-0">
                                    {{ $category->description ?? 'Esta categoría no tiene una descripción asignada.' }}
                                </dd>
                            </div>

                            <!-- Fechas -->
                            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-gray-300">Fecha de creación</dt>
                                <dd class="mt-1 text-sm leading-6 text-gray-700 dark:text-gray-400 sm:col-span-2 sm:mt-0">
                                    {{ $category->created_at ? $category->created_at->format('d/m/Y h:i A') : 'No disponible' }}
                                </dd>
                            </div>

                        </dl>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
