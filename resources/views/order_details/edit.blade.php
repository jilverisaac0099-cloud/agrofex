<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('order_details.index') }}" class="text-gray-400 hover:text-agro-green transition p-2 bg-zinc-900 rounded-full border border-zinc-800 hover:border-agro-green">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <h2 class="font-bold text-2xl text-white leading-tight tracking-tight">
                {{ __('Editar Detalle de Pedido') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-agro-card shadow-xl sm:rounded-3xl border border-zinc-800 overflow-hidden relative">
                <div class="absolute top-0 right-0 -mt-8 -mr-8 w-48 h-48 bg-agro-green/10 rounded-full blur-3xl pointer-events-none"></div>

                <form method="POST" action="{{ route('order_details.update', $orderDetail->id) }}" class="p-8 space-y-6 relative z-10">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="order_id" class="block font-medium text-sm text-gray-300 mb-2">Pedido Asociado *</label>
                            <select id="order_id" name="order_id" class="block w-full bg-agro-dark border-zinc-700 text-white focus:border-agro-green focus:ring-agro-green rounded-xl shadow-sm px-4 py-3 transition-colors" required>
                                <option value="">Seleccione un pedido...</option>
                                @foreach($orders as $order)
                                    <option value="{{ $order->id }}" {{ old('order_id', $orderDetail->order_id) == $order->id ? 'selected' : '' }}>
                                        Pedido #{{ $order->id }}
                                    </option>
                                @endforeach
                            </select>
                            @error('order_id') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="customer_id" class="block font-medium text-sm text-gray-300 mb-2">Cliente *</label>
                            <select id="customer_id" name="customer_id" class="block w-full bg-agro-dark border-zinc-700 text-white focus:border-agro-green focus:ring-agro-green rounded-xl shadow-sm px-4 py-3 transition-colors" required>
                                <option value="">Seleccione un cliente...</option>
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}" {{ old('customer_id', $orderDetail->customer_id) == $customer->id ? 'selected' : '' }}>
                                        {{ $customer->name }} {{ $customer->last_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('customer_id') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label for="product_id" class="block font-medium text-sm text-gray-300 mb-2">Producto *</label>
                            <select id="product_id" name="product_id" class="block w-full bg-agro-dark border-zinc-700 text-white focus:border-agro-green focus:ring-agro-green rounded-xl shadow-sm px-4 py-3 transition-colors" required>
                                <option value="">Seleccione un producto...</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" {{ old('product_id', $orderDetail->product_id) == $product->id ? 'selected' : '' }}>
                                        {{ $product->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('product_id') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="amount" class="block font-medium text-sm text-gray-300 mb-2">Monto / Cantidad *</label>
                            <input id="amount" class="block w-full bg-agro-dark border-zinc-700 text-white focus:border-agro-green focus:ring-agro-green rounded-xl shadow-sm px-4 py-3 transition-colors" type="number" step="0.01" min="0.01" name="amount" value="{{ old('amount', $orderDetail->amount) }}" required />
                            @error('amount') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="price" class="block font-medium text-sm text-gray-300 mb-2">Precio Unitario ($) *</label>
                            <input id="price" class="block w-full bg-agro-dark border-zinc-700 text-white focus:border-agro-green focus:ring-agro-green rounded-xl shadow-sm px-4 py-3 transition-colors" type="number" step="0.01" min="0" name="price" value="{{ old('price', $orderDetail->price) }}" required />
                            @error('price') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label for="subtotal" class="block font-medium text-sm text-gray-300 mb-2">Subtotal Calculado ($) *</label>
                            <input id="subtotal" class="block w-full bg-agro-dark border-zinc-700 text-white focus:border-agro-green focus:ring-agro-green rounded-xl shadow-sm px-4 py-3 transition-colors" type="number" step="0.01" min="0" name="subtotal" value="{{ old('subtotal', $orderDetail->subtotal) }}" required />
                            @error('subtotal') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-6 mt-10 pt-6 border-t border-zinc-800">
                        <a href="{{ route('order_details.index') }}" class="text-sm text-gray-400 hover:text-white transition font-medium">Cancelar</a>
                        <button type="submit" class="flex items-center gap-2 bg-agro-green text-black px-8 py-3 rounded-full font-bold hover:bg-green-500 transition shadow-[0_0_15px_rgba(0,214,50,0.3)] uppercase tracking-wider text-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                            Actualizar Detalle
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
