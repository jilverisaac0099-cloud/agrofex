        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-bold text-2xl text-white leading-tight tracking-tight">
                    {{ __('Panel de Control - Eco-Mercado Digital') }}
                </h2>
            </x-slot>

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

                    <!-- Banner de Bienvenida -->
                    <div class="bg-agro-card overflow-hidden shadow-2xl sm:rounded-3xl border border-zinc-800 p-8 relative">
                        <div class="absolute top-0 right-0 -mt-4 -mr-4 w-48 h-48 bg-agro-green/10 rounded-full blur-3xl"></div>
                        <div class="flex items-center gap-6 relative z-10">
                            <div class="flex-shrink-0 w-16 h-16 bg-zinc-900 rounded-full flex items-center justify-center border border-agro-green/50 shadow-[0_0_15px_rgba(0,214,50,0.2)]">
                                <span class="text-3xl text-agro-green">🌱</span>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-white mb-1">
                                    ¡Bienvenido al Marketplace, {{ Auth::user()->name }}!
                                </h3>
                                <p class="text-gray-400">
                                    Aquí tienes el resumen y los accesos rápidos a todos los módulos de tu plataforma agrícola.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Grid de Módulos -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                        <!-- 1. Productores -->
                        <a href="{{ route('producers.index') }}" class="group block bg-agro-card overflow-hidden shadow-lg sm:rounded-2xl border border-zinc-800 hover:border-agro-green hover:shadow-[0_0_15px_rgba(0,214,50,0.1)] hover:-translate-y-1 transition-all duration-300">
                            <div class="p-6">
                                <div class="flex justify-between items-start mb-4">
                                    <div>
                                        <h4 class="text-lg font-bold text-white mb-1 group-hover:text-agro-green transition-colors">Productores</h4>
                                    </div>
                                    <div class="p-2 bg-zinc-900 rounded-lg border border-zinc-700 text-agro-green group-hover:scale-110 transition-transform duration-300">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                                    </div>
                                </div>
                                <p class="text-sm text-gray-400 mb-4 h-10">Administra a los agricultores y vendedores de tu marketplace.</p>
                                <div class="flex items-center text-sm font-semibold text-agro-green">
                                    Gestionar <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                </div>
                            </div>
                        </a>

                        <!-- 2. Productos y Cosechas -->
                        <a href="{{ route('products.index') }}" class="group block bg-agro-card overflow-hidden shadow-lg sm:rounded-2xl border border-zinc-800 hover:border-agro-green hover:shadow-[0_0_15px_rgba(0,214,50,0.1)] hover:-translate-y-1 transition-all duration-300">
                            <div class="p-6">
                                <div class="flex justify-between items-start mb-4">
                                    <div>
                                        <h4 class="text-lg font-bold text-white mb-1 group-hover:text-agro-green transition-colors">Cosechas</h4>
                                    </div>
                                    <div class="p-2 bg-zinc-900 rounded-lg border border-zinc-700 text-agro-green group-hover:scale-110 transition-transform duration-300">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6z"></path></svg>
                                    </div>
                                </div>
                                <p class="text-sm text-gray-400 mb-4 h-10">Controla el catálogo de frutas, verduras e insumos disponibles.</p>
                                <div class="flex items-center text-sm font-semibold text-agro-green">
                                    Catálogo <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                </div>
                            </div>
                        </a>

                        <!-- 3. Categorías -->
                        <a href="{{ route('categories.index') }}" class="group block bg-agro-card overflow-hidden shadow-lg sm:rounded-2xl border border-zinc-800 hover:border-agro-green hover:shadow-[0_0_15px_rgba(0,214,50,0.1)] hover:-translate-y-1 transition-all duration-300">
                            <div class="p-6">
                                <div class="flex justify-between items-start mb-4">
                                    <div>
                                        <h4 class="text-lg font-bold text-white mb-1 group-hover:text-agro-green transition-colors">Categorías</h4>
                                    </div>
                                    <div class="p-2 bg-zinc-900 rounded-lg border border-zinc-700 text-agro-green group-hover:scale-110 transition-transform duration-300">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                                    </div>
                                </div>
                                <p class="text-sm text-gray-400 mb-4 h-10">Organiza tus productos por familias (Frutas, Hortalizas).</p>
                                <div class="flex items-center text-sm font-semibold text-agro-green">
                                    Ver Categorías <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                </div>
                            </div>
                        </a>

                        <!-- 4. Clientes -->
                        <a href="{{ route('customers.index') }}" class="group block bg-agro-card overflow-hidden shadow-lg sm:rounded-2xl border border-zinc-800 hover:border-agro-green hover:shadow-[0_0_15px_rgba(0,214,50,0.1)] hover:-translate-y-1 transition-all duration-300">
                            <div class="p-6">
                                <div class="flex justify-between items-start mb-4">
                                    <div>
                                        <h4 class="text-lg font-bold text-white mb-1 group-hover:text-agro-green transition-colors">Clientes</h4>
                                    </div>
                                    <div class="p-2 bg-zinc-900 rounded-lg border border-zinc-700 text-agro-green group-hover:scale-110 transition-transform duration-300">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                    </div>
                                </div>
                                <p class="text-sm text-gray-400 mb-4 h-10">Visualiza la cartera de compradores de tu plataforma.</p>
                                <div class="flex items-center text-sm font-semibold text-agro-green">
                                    Ver Clientes <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                </div>
                            </div>
                        </a>

                        <!-- 5. Pedidos (Acento Amarillo) -->
                        <a href="{{ route('orders.index') }}" class="group block bg-agro-card overflow-hidden shadow-lg sm:rounded-2xl border border-zinc-800 hover:border-agro-yellow hover:shadow-[0_0_15px_rgba(255,193,7,0.1)] hover:-translate-y-1 transition-all duration-300">
                            <div class="p-6">
                                <div class="flex justify-between items-start mb-4">
                                    <div>
                                        <h4 class="text-lg font-bold text-white mb-1 group-hover:text-agro-yellow transition-colors">Pedidos</h4>
                                    </div>
                                    <div class="p-2 bg-zinc-900 rounded-lg border border-zinc-700 text-agro-yellow group-hover:scale-110 transition-transform duration-300">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                                    </div>
                                </div>
                                <p class="text-sm text-gray-400 mb-4 h-10">Controla las compras realizadas en el marketplace.</p>
                                <div class="flex items-center text-sm font-semibold text-agro-yellow">
                                    Revisar Pedidos <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                </div>
                            </div>
                        </a>

                        <!-- 6. Detalles de Pedidos -->
                        <a href="{{ route('order_details.index') }}" class="group block bg-agro-card overflow-hidden shadow-lg sm:rounded-2xl border border-zinc-800 hover:border-agro-yellow hover:shadow-[0_0_15px_rgba(255,193,7,0.1)] hover:-translate-y-1 transition-all duration-300">
                            <div class="p-6">
                                <div class="flex justify-between items-start mb-4">
                                    <div>
                                        <h4 class="text-lg font-bold text-white mb-1 group-hover:text-agro-yellow transition-colors">Detalles</h4>
                                    </div>
                                    <div class="p-2 bg-zinc-900 rounded-lg border border-zinc-700 text-agro-yellow group-hover:scale-110 transition-transform duration-300">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                                    </div>
                                </div>
                                <p class="text-sm text-gray-400 mb-4 h-10">Revisa líneas individuales, cantidades y precios por orden.</p>
                                <div class="flex items-center text-sm font-semibold text-agro-yellow">
                                    Ver Detalles <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                </div>
                            </div>
                        </a>

                        <!-- 7. Pagos -->
                        <a href="{{ route('payments.index') }}" class="group block bg-agro-card overflow-hidden shadow-lg sm:rounded-2xl border border-zinc-800 hover:border-agro-yellow hover:shadow-[0_0_15px_rgba(255,193,7,0.1)] hover:-translate-y-1 transition-all duration-300">
                            <div class="p-6">
                                <div class="flex justify-between items-start mb-4">
                                    <div>
                                        <h4 class="text-lg font-bold text-white mb-1 group-hover:text-agro-yellow transition-colors">Pagos</h4>
                                    </div>
                                    <div class="p-2 bg-zinc-900 rounded-lg border border-zinc-700 text-agro-yellow group-hover:scale-110 transition-transform duration-300">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </div>
                                </div>
                                <p class="text-sm text-gray-400 mb-4 h-10">Administra las transacciones y el flujo de caja.</p>
                                <div class="flex items-center text-sm font-semibold text-agro-yellow">
                                    Ver Pagos <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                </div>
                            </div>
                        </a>

                        <!-- 8. Direcciones y Envíos -->
                        <a href="{{ route('address_shippings.index') }}" class="group block bg-agro-card overflow-hidden shadow-lg sm:rounded-2xl border border-zinc-800 hover:border-agro-green hover:shadow-[0_0_15px_rgba(0,214,50,0.1)] hover:-translate-y-1 transition-all duration-300">
                            <div class="p-6">
                                <div class="flex justify-between items-start mb-4">
                                    <div>
                                        <h4 class="text-lg font-bold text-white mb-1 group-hover:text-agro-green transition-colors">Envíos</h4>
                                    </div>
                                    <div class="p-2 bg-zinc-900 rounded-lg border border-zinc-700 text-agro-green group-hover:scale-110 transition-transform duration-300">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
                                    </div>
                                </div>
                                <p class="text-sm text-gray-400 mb-4 h-10">Gestiona las direcciones y rutas de entrega a clientes.</p>
                                <div class="flex items-center text-sm font-semibold text-agro-green">
                                    Controlar Envíos <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                </div>
                            </div>
                        </a>

                        <!-- 9. Reseñas y Comentarios -->
                        <a href="{{ route('comments.index') }}" class="group block bg-agro-card overflow-hidden shadow-lg sm:rounded-2xl border border-zinc-800 hover:border-agro-green hover:shadow-[0_0_15px_rgba(0,214,50,0.1)] hover:-translate-y-1 transition-all duration-300">
                            <div class="p-6">
                                <div class="flex justify-between items-start mb-4">
                                    <div>
                                        <h4 class="text-lg font-bold text-white mb-1 group-hover:text-agro-green transition-colors">Reseñas</h4>
                                    </div>
                                    <div class="p-2 bg-zinc-900 rounded-lg border border-zinc-700 text-agro-green group-hover:scale-110 transition-transform duration-300">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                                    </div>
                                </div>
                                <p class="text-sm text-gray-400 mb-4 h-10">Modera las opiniones sobre productos y productores.</p>
                                <div class="flex items-center text-sm font-semibold text-agro-green">
                                    Ver Reseñas <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>
            </div>
        </x-app-layout>