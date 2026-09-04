<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-white leading-tight tracking-tight">
                {{ __('Detalles del Producto') }} <span class="text-agro-green">#{{ $product->id }}</span>
            </h2>
            <div class="flex items-center gap-3">
                <a href="{{ route('products.edit', $product->id) }}" class="flex items-center gap-2 bg-blue-600 text-white px-5 py-2 rounded-full font-semibold hover:bg-blue-500 transition text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Editar
                </a>
                <a href="{{ route('products.index') }}" class="flex items-center gap-2 bg-zinc-800 text-gray-300 px-5 py-2 rounded-full font-semibold hover:bg-zinc-700 hover:text-white transition text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Volver a la lista
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-agro-card shadow-xl sm:rounded-2xl border border-zinc-800 p-6 md:p-8 space-y-6">
                
                <div class="border-b border-zinc-800 pb-6 flex items-center justify-between">
                    <div>
                        <span class="text-xs font-mono text-gray-500 block mb-1">ID PRODUCTO: #{{ $product->id }}</span>
                        <h1 class="text-3xl font-bold text-white">{{ $product->name }}</h1>
                    </div>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold border capitalize {{ strtolower($product->status) == 'activo' ? 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20' : 'bg-zinc-800 text-gray-400 border-zinc-700' }}">
                        {{ $product->status }}
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <!-- 1. Nombre -->
                    <div class="bg-zinc-900/50 p-4 rounded-xl border border-zinc-800/80">
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Nombre del Producto</label>
                        <p class="text-white text-base font-medium mt-1">{{ $product->name }}</p>
                    </div>

                    <!-- 2. Precio -->
                    <div class="bg-zinc-900/50 p-4 rounded-xl border border-zinc-800/80">
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Precio</label>
                        <p class="text-2xl font-bold text-agro-green mt-1">
                            ${{ number_format($product->price, 2) }}
                        </p>
                    </div>

                    <!-- 3. Categoría -->
                    <div class="bg-zinc-900/50 p-4 rounded-xl border border-zinc-800/80">
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Categoría</label>
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-zinc-800 text-gray-300 border border-zinc-700 mt-1">
                            {{ $product->category->name ?? 'Sin Categoría' }}
                        </span>
                    </div>

                    <!-- 4. Productor -->
                    <div class="bg-zinc-900/50 p-4 rounded-xl border border-zinc-800/80">
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Productor</label>
                        <p class="text-white text-base font-medium mt-1">
                            {{ $product->producer->name ?? 'N/A' }} {{ $product->producer->lastname ?? '' }}
                        </p>
                    </div>

                    <!-- 5. Estado -->
                    <div class="bg-zinc-900/50 p-4 rounded-xl border border-zinc-800/80">
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Estado</label>
                        <p class="text-white text-base font-medium mt-1">
                            {{ $product->status }}
                        </p>
                    </div>

                    <!-- 6. Descripción -->
                    <div class="md:col-span-2 bg-zinc-900/50 p-4 rounded-xl border border-zinc-800/80">
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Descripción</label>
                        <p class="text-gray-300 text-sm leading-relaxed">
                            {{ $product->description ?? 'Sin descripción disponible.' }}
                        </p>
                    </div>

                </div>

                <div class="flex justify-between items-center pt-6 border-t border-zinc-800">
                    <form id="form-delete-{{ $product->id }}" action="{{ route('products.destroy', $product->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="confirmarEliminacion({{ $product->id }})" class="text-red-500 hover:text-red-400 font-semibold text-sm transition">
                            Eliminar Producto
                        </button>
                    </form>

                    <a href="{{ route('products.index') }}" class="px-6 py-2.5 rounded-full font-bold text-gray-400 hover:text-white transition text-sm uppercase tracking-wider">
                        Volver
                    </a>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmarEliminacion(id) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "El producto será eliminado permanentemente.",
                icon: 'warning',
                background: '#18181B',
                color: '#ffffff',
                showCancelButton: true,
                confirmButtonColor: '#EF4444',
                cancelButtonColor: '#3F3F46',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar',
                customClass: {
                    popup: 'border border-zinc-800 rounded-2xl shadow-2xl',
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('form-delete-' + id).submit();
                }
            });
        }
    </script>
</x-app-layout>