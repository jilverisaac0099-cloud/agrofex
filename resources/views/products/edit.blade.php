x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-white leading-tight tracking-tight">
                {{ __('Editar Producto') }} <span class="text-agro-green">#{{ $product->id }}</span>
            </h2>
            <a href="{{ route('products.index') }}" class="flex items-center gap-2 bg-zinc-800 text-gray-300 px-5 py-2 rounded-full font-semibold hover:bg-zinc-700 hover:text-white transition text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Volver a la lista
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-agro-card shadow-xl sm:rounded-2xl border border-zinc-800 p-6 md:p-8">
                <form action="{{ route('products.update', $product->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        <!-- 1. Nombre del Producto -->
                        <div class="md:col-span-2">
                            <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Nombre del Producto *</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" maxlength="50" required class="w-full bg-zinc-900 border border-zinc-800 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-agro-green focus:ring-1 focus:ring-agro-green transition" placeholder="Ej. Tomate Manta de Cielo">
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- 2. Descripción -->
                        <div class="md:col-span-2">
                            <label for="description" class="block text-sm font-medium text-gray-300 mb-2">Descripción (Opcional)</label>
                            <textarea name="description" id="description" rows="3" maxlength="400" class="w-full bg-zinc-900 border border-zinc-800 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-agro-green focus:ring-1 focus:ring-agro-green transition" placeholder="Detalles sobre el origen, calidad o presentación del producto...">{{ old('description', $product->description) }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- 3. Categoría -->
                        <div>
                            <label for="category_id" class="block text-sm font-medium text-gray-300 mb-2">Categoría *</label>
                            <select name="category_id" id="category_id" required class="w-full bg-zinc-900 border border-zinc-800 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-agro-green focus:ring-1 focus:ring-agro-green transition">
                                <option value="" disabled>Selecciona una categoría</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- 4. Productor -->
                        <div>
                            <label for="producer_id" class="block text-sm font-medium text-gray-300 mb-2">Productor *</label>
                            <select name="producer_id" id="producer_id" required class="w-full bg-zinc-900 border border-zinc-800 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-agro-green focus:ring-1 focus:ring-agro-green transition">
                                <option value="" disabled>Selecciona un productor</option>
                                @foreach($producers as $producer)
                                    <option value="{{ $producer->id }}" {{ old('producer_id', $product->producer_id) == $producer->id ? 'selected' : '' }}>
                                        {{ $producer->name }} {{ $producer->lastname }}
                                    </option>
                                @endforeach
                            </select>
                            @error('producer_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- 5. Precio -->
                        <div>
                            <label for="price" class="block text-sm font-medium text-gray-300 mb-2">Precio ($) *</label>
                            <input type="number" step="0.01" min="0" name="price" id="price" value="{{ old('price', $product->price) }}" required class="w-full bg-zinc-900 border border-zinc-800 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-agro-green focus:ring-1 focus:ring-agro-green transition" placeholder="0.00">
                            @error('price')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- 6. Estado -->
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-300 mb-2">Estado *</label>
                            <select name="status" id="status" required class="w-full bg-zinc-900 border border-zinc-800 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-agro-green focus:ring-1 focus:ring-agro-green transition">
                                <option value="Activo" {{ old('status', $product->status) == 'Activo' ? 'selected' : '' }}>Activo</option>
                                <option value="Inactivo" {{ old('status', $product->status) == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                                <option value="Agotado" {{ old('status', $product->status) == 'Agotado' ? 'selected' : '' }}>Agotado</option>
                            </select>
                            @error('status')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <!-- Botones de Acción -->
                    <div class="flex justify-end gap-4 pt-4 border-t border-zinc-800">
                        <a href="{{ route('products.index') }}" class="px-6 py-2.5 rounded-full font-bold text-gray-400 hover:text-white transition text-sm uppercase tracking-wider flex items-center">
                            Cancelar
                        </a>
                        <button type="submit" class="bg-agro-green text-black px-8 py-2.5 rounded-full font-bold hover:bg-green-500 transition shadow-[0_0_15px_rgba(0,214,50,0.3)] text-sm uppercase tracking-wider">
                            Actualizar Producto
                        </button>
                    </div>
                </form>
            </div>
        </div>
</div>
</x-app-layout>