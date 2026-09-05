<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-white leading-tight tracking-tight">
                Detalle del Pago <span class="text-agro-green">#{{ $payment->id }}</span>
            </h2>
            <div class="flex items-center gap-3">
                <a href="{{ route('payments.edit', $payment->id) }}" class="flex items-center gap-2 bg-blue-600/20 text-blue-400 px-5 py-2 rounded-full font-bold hover:bg-blue-600 hover:text-white border border-blue-500/30 transition text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    Editar
                </a>
                <a href="{{ route('payments.index') }}" class="flex items-center gap-2 bg-zinc-800 text-gray-300 px-5 py-2 rounded-full font-bold hover:bg-zinc-700 hover:text-white border border-zinc-700 transition text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Volver
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#1a1a1c] shadow-2xl sm:rounded-3xl border border-zinc-800 overflow-hidden relative p-8 space-y-6">
                <div class="absolute top-0 right-0 -mt-8 -mr-8 w-48 h-48 bg-[#00d632]/10 rounded-full blur-3xl pointer-events-none"></div>

                <div class="flex justify-between items-start border-b border-zinc-800 pb-6 relative z-10">
                    <div>
                        <span class="text-xs font-bold text-gray-500 uppercase tracking-wider">REGISTRO DE TRANSACCIÓN</span>
                        <h3 class="text-3xl font-extrabold text-white mt-1">Pedido Asociado #{{ $payment->order_id }}</h3>
                        <p class="text-sm text-agro-green mt-1 font-semibold">Método: {{ $payment->payment_method ?? 'N/A' }}</p>
                    </div>
                    <span class="px-4 py-1.5 rounded-full text-sm font-bold bg-[#00d632]/10 text-[#00d632] border border-[#00d632]/20">
                        Estado: {{ ucfirst($payment->status ?? 'Pendiente') }}
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 relative z-10">
                    <div class="bg-zinc-900/50 p-5 rounded-2xl border border-zinc-800/80">
                        <span class="text-xs font-bold text-gray-500 uppercase tracking-wider block mb-1">Fecha de Pago</span>
                        <p class="text-lg font-semibold text-white">{{ $payment->date ?? 'N/A' }}</p>
                    </div>

                    <div class="bg-zinc-900/50 p-5 rounded-2xl border border-zinc-800/80 border-b-2 border-b-[#00d632] shadow-[0_4px_20px_rgba(0,214,50,0.05)]">
                        <span class="text-xs font-bold text-[#00d632]/80 uppercase tracking-wider block mb-1">Monto Pagado</span>
                        <p class="text-3xl font-black text-[#00d632]">${{ number_format($payment->amount_paid ?? 0, 2) }}</p>
                    </div>
                </div>

                <div class="flex items-center justify-between pt-6 border-t border-zinc-800 relative z-10">
                    <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este pago?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="flex items-center gap-2 text-red-500 hover:text-red-400 font-bold text-sm tracking-wider uppercase transition group">
                            <svg class="w-4 h-4 group-hover:scale-110 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            Eliminar Pago
                        </button>
                    </form>
                    <a href="{{ route('payments.index') }}" class="text-gray-400 hover:text-white font-bold text-sm tracking-wider uppercase transition">
                        VOLVER AL LISTADO
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</x-app-layout>

