<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100 leading-tight tracking-tight">
            {{ __('Panel de Control - Marketplace Agrícola') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 dark:border-gray-700 p-8 relative">
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-32 h-32 bg-emerald-500 opacity-10 rounded-full blur-3xl"></div>
                <div class="flex items-center gap-6 relative z-10">
                    <div class="flex-shrink-0 w-16 h-16 bg-emerald-100 dark:bg-emerald-900/50 rounded-full flex items-center justify-center border border-emerald-200 dark:border-emerald-800/50">
                        <span class="text-3xl">🌱</span>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-1">
                            ¡Bienvenido al Marketplace, {{ Auth::user()->name }}!
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400">
                            Aquí tienes el resumen y los accesos rápidos a todos los módulos de tu plataforma agrícola.
                        </p>
                    </div>
                </div>
            </div>


            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                <a href="{{ route('producers.index') }}" class="group block bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-2xl border border-gray-100 dark:border-gray-700 hover:border-emerald-500/50 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="p-8">
                        <div class="flex justify-between items-start mb-6">
                            <div>
                                <h4 class="text-xl font-bold text-gray-900 dark:text-white mb-2 group-hover:text-emerald-600 transition-colors">Productores</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Administra a los agricultores y vendedores de tu marketplace.</p>
                            </div>
                            <div class="p-3 bg-emerald-50 dark:bg-emerald-900/30 rounded-xl border border-emerald-100 text-emerald-600 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                            </div>
                        </div>
                        <div class="flex items-center text-sm font-semibold text-emerald-600">
                            Gestionar Productores <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </div>
                    </div>
                </a>


                <a href="{{ route('products.index') }}" class="group block bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-2xl border border-gray-100 dark:border-gray-700 hover:border-lime-500/50 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="p-8">
                        <div class="flex justify-between items-start mb-6">
                            <div>
                                <h4 class="text-xl font-bold text-gray-900 dark:text-white mb-2 group-hover:text-lime-600 transition-colors">Productos y Cosechas</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Controla el catálogo de frutas, verduras, granos e insumos disponibles.</p>
                            </div>
                            <div class="p-3 bg-lime-50 dark:bg-lime-900/30 rounded-xl border border-lime-100 text-lime-600 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6z"></path></svg>
                            </div>
                        </div>
                        <div class="flex items-center text-sm font-semibold text-lime-600">
                            Administrar Catálogo <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </div>
                    </div>
                </a>

                <a href="{{ route('categories.index') }}" class="group block bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-2xl border border-gray-100 dark:border-gray-700 hover:border-green-500/50 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="p-8">
                        <div class="flex justify-between items-start mb-6">
                            <div>
                                <h4 class="text-xl font-bold text-gray-900 dark:text-white mb-2 group-hover:text-green-600 transition-colors">Categorías</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Organiza tus productos por familias (ej. Hortalizas, Frutas, Herramientas).</p>
                            </div>
                            <div class="p-3 bg-green-50 dark:bg-green-900/30 rounded-xl border border-green-100 text-green-600 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                            </div>
                        </div>
                        <div class="flex items-center text-sm font-semibold text-green-600">
                            Ver Categorías <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </div>
                    </div>
                </a>

                <a href="{{ route('customers.index') }}" class="group block bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-2xl border border-gray-100 dark:border-gray-700 hover:border-blue-500/50 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="p-8">
                        <div class="flex justify-between items-start mb-6">
                            <div>
                                <h4 class="text-xl font-bold text-gray-900 dark:text-white mb-2 group-hover:text-blue-600 transition-colors">Clientes</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Visualiza la cartera de clientes y compradores de tu plataforma.</p>
                            </div>
                            <div class="p-3 bg-blue-50 dark:bg-blue-900/30 rounded-xl border border-blue-100 text-blue-600 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            </div>
                        </div>
                        <div class="flex items-center text-sm font-semibold text-blue-600">
                            Ver Clientes <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </div>
                    </div>
                </a>

                <a href="{{ route('orders.index') }}" class="group block bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-2xl border border-gray-100 dark:border-gray-700 hover:border-amber-500/50 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="p-8">
                        <div class="flex justify-between items-start mb-6">
                            <div>
                                <h4 class="text-xl font-bold text-gray-900 dark:text-white mb-2 group-hover:text-amber-600 transition-colors">Pedidos</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Controla las compras realizadas y genera detalles de pedidos (Order Detail).</p>
                            </div>
                            <div class="p-3 bg-amber-50 dark:bg-amber-900/30 rounded-xl border border-amber-100 text-amber-600 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                            </div>
                        </div>
                        <div class="flex items-center text-sm font-semibold text-amber-600">
                            Revisar Pedidos <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </div>
                    </div>
                </a>


                <a href="{{ route('order_details.index') }}" class="group block bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-2xl border border-gray-100 dark:border-gray-700 hover:border-rose-500/50 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="p-8">
                        <div class="flex justify-between items-start mb-6">
                            <div>
                                <h4 class="text-xl font-bold text-gray-900 dark:text-white mb-2 group-hover:text-rose-600 transition-colors">Detalles de Pedidos</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Revisa las líneas individuales, cantidades y precios de los productos en cada orden.</p>
                            </div>
                            <div class="p-3 bg-rose-50 dark:bg-rose-900/30 rounded-xl border border-rose-100 text-rose-600 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                            </div>
                        </div>
                        <div class="flex items-center text-sm font-semibold text-rose-600">
                            Ver Detalles <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </div>
                    </div>
                </a>

                <a href="{{ route('payments.index') }}" class="group block bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-2xl border border-gray-100 dark:border-gray-700 hover:border-yellow-500/50 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="p-8">
                        <div class="flex justify-between items-start mb-6">
                            <div>
                                <h4 class="text-xl font-bold text-gray-900 dark:text-white mb-2 group-hover:text-yellow-600 transition-colors">Pago</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Administra las transacciones, transferencias y el flujo de caja.</p>
                            </div>
                            <div class="p-3 bg-yellow-50 dark:bg-yellow-900/30 rounded-xl border border-yellow-100 text-yellow-600 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                        </div>
                        <div class="flex items-center text-sm font-semibold text-yellow-600">
                            Ver Pagos <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </div>
                    </div>
                </a>

                <!-- 7. Envíos (AddressShipping) -->
                <a href="{{ route('address_shippings.index') }}" class="group block bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-2xl border border-gray-100 dark:border-gray-700 hover:border-teal-500/50 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="p-8">
                        <div class="flex justify-between items-start mb-6">
                            <div>
                                <h4 class="text-xl font-bold text-gray-900 dark:text-white mb-2 group-hover:text-teal-600 transition-colors">direcciones</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Gestiona las direcciones de envío y las rutas de entrega a clientes.</p>
                            </div>
                            <div class="p-3 bg-teal-50 dark:bg-teal-900/30 rounded-xl border border-teal-100 text-teal-600 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
                            </div>
                        </div>
                        <div class="flex items-center text-sm font-semibold text-teal-600">
                            Controlar Envíos <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </div>
                    </div>
                </a>

                <a href="{{ route('comments.index') }}" class="group block bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-2xl border border-gray-100 dark:border-gray-700 hover:border-purple-500/50 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="p-8">
                        <div class="flex justify-between items-start mb-6">
                            <div>
                                <h4 class="text-xl font-bold text-gray-900 dark:text-white mb-2 group-hover:text-purple-600 transition-colors">Reseñas y Comentarios</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Modera las opiniones de los clientes sobre los productos y productores.</p>
                            </div>
                            <div class="p-3 bg-purple-50 dark:bg-purple-900/30 rounded-xl border border-purple-100 text-purple-600 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                            </div>
                        </div>
                        <div class="flex items-center text-sm font-semibold text-purple-600">
                            Ver Reseñas <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </div>
                    </div>
                </a>

            </div>
        </div>
    </div>
</x-app-layout>
