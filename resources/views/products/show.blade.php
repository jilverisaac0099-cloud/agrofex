<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100 leading-tight tracking-tight">
                {{ __('Detalles del Producto') }}: <span class="text-indigo-600 dark:text-indigo-400">{{ $product->name }}</span>
            </h2>
            <a href="{{ route('products.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 dark:bg-gray-700 border border-transparent rounded-xl font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest hover:bg-gray-200 dark:hover:bg-gray-600 transition ease-in-out duration-150">
                Volver a la lista
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100 dark:border-gray-700">
                
                <div class="p-6 sm:p-8">
                    <div class="space-y-8">
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            
                            <div class="bg-gray-50 dark:bg-gray-900/50 p-4 rounded-xl border border-gray-100 dark:border-gray-700">
                                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">Nombre del producto</h3>
                                <p class="text-lg font-semibold text-gray-900 dark:text-white">{{ $product->name }}</p>
                            </div>

                            <div class="bg-gray-50 dark:bg-gray-900/50 p-4 rounded-xl border border-gray-100 dark:border-gray-700">
                                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">Precio</h3>
                                <p class="text-lg font-semibold text-gray-900 dark:text-white">C$ {{ number_format($product->price, 2) }}</p>
                            </div>

                            <div class="bg-gray-50 dark:bg-gray-900/50 p-4 rounded-xl border border-gray-100 dark:border-gray-700">
                                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">Estado</h3>
                                <div>

                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium border {{ $statusClasses }}">
                                        {{ $statusText }}
                                    </span>
                                </div>
                            </div>

                            <div class="bg-gray-50 dark:bg-gray-900/50 p-4 rounded-xl border border-gray-100 dark:border-gray-700">
                                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">Categoría</h3>
                                <p class="text-lg font-semibold text-gray-900 dark:text-white">{{ $product->category->name ?? 'Sin categoría asignada' }}</p>
                            </div>

                            <div class="bg-gray-50 dark:bg-gray-900/50 p-4 rounded-xl border border-gray-100 dark:border-gray-700">
                                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">Productor</h3>
                                <p class="text-lg font-semibold text-gray-900 dark:text-white">{{ $product->producer->name ?? 'Sin productor asignado' }} {{ $product->producer->lastname ?? '' }}</p>
                            </div>

                            <div class="bg-gray-50 dark:bg-gray-900/50 p-4 rounded-xl border border-gray-100 dark:border-gray-700 md:col-span-2">
                                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">Descripción</h3>
                                <p class="text-base text-gray-900 dark:text-gray-200 whitespace-pre-wrap">{{ $product->description ?? 'El producto no tiene una descripción detallada.' }}</p>
                            </div>
                        </div>

                    </div>

                    <div class="mt-10 flex justify-end items-center space-x-4 pt-6 border-t border-gray-100 dark:border-gray-700">
                        <a href="{{ route('products.index') }}" class="px-4 py-2 text-sm font-semibold text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white tracking-widest uppercase transition-colors">
                            Volver
                        </a>
                        <a href="{{ route('products.edit', $product) }}" class="px-6 py-2.5 bg-indigo-600 border border-transparent rounded-lg font-bold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors">
                            Editar Producto
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

