<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100 leading-tight tracking-tight">
                {{ __('Editar Orden') }}
            </h2>
            <a href="{{ route('orders.index') }}" class="text-sm text-gray-500 hover:text-indigo-600 dark:text-gray-400 dark:hover:text-indigo-400 transition-colors font-medium">
                &larr; Volver a la lista
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 dark:border-gray-700 p-8">
                
                <form action="{{ route('orders.update', $order) }}" method="POST" id="form-edit-{{ $order->id }}" onsubmit="confirmarActualizacion(event, {{ $order->id }})" novalidate>
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-6">
                        <label for="customer_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Cliente</label>
                        <select id="customer_id" name="customer_id" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                            <option value="">-- Seleccione un cliente --</option>
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}" {{ old('customer_id', $order->customer_id) == $customer->id ? 'selected' : '' }}>
                                    {{ $customer->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('customer_id')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="date_time" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Fecha y Hora</label>
                        <input type="datetime-local" id="date_time" name="date_time" value="{{ old('date_time', $order->date_time) }}" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                        @error('date_time')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="subtotal" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Subtotal ($)</label>
                        <input type="number" id="subtotal" name="subtotal" value="{{ old('subtotal', $order->subtotal) }}" step="0.01" min="0" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                        @error('subtotal')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="total" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Total ($)</label>
                        <input type="number" id="total" name="total" value="{{ old('total', $order->total) }}" step="0.01" min="0" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                        @error('total')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Estado de la Orden</label>
                        <select id="status" name="status" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                            <option value="">-- Seleccione un estado --</option>
                            <option value="pendiente" {{ old('status', $order->status) == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                            <option value="procesando" {{ old('status', $order->status) == 'procesando' ? 'selected' : '' }}>Procesando</option>
                            <option value="completada" {{ old('status', $order->status) == 'completada' ? 'selected' : '' }}>Completada</option>
                            <option value="cancelada" {{ old('status', $order->status) == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                        </select>
                        @error('status')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end gap-4 mt-8 pt-6 border-t border-gray-100 dark:border-gray-700">
                        <a href="{{ route('orders.index') }}" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-xl font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
                            Cancelar
                        </a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 shadow-lg shadow-indigo-500/30">
                            Actualizar Orden
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        function confirmarActualizacion(event, id) {
            event.preventDefault();

            Swal.fire({
                title: '¿Guardar los cambios?',
                text: "Se actualizará la información de esta orden.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#4f46e5',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Sí, actualizar',
                cancelButtonText: 'Cancelar',
                background: '#1e293b',
                color: '#ffffff',
                customClass: {
                    popup: 'rounded-2xl border border-gray-700'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('form-edit-' + id).submit(); 
                }
            })
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</x-app-layout>

