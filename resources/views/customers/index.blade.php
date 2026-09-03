<x-app-layout>
    <div class="py-12 bg-agro-bg min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-3xl font-bold text-white tracking-tight">
                    Clientes
                </h2>
                
                <a href="{{ route('customers.create') }}" class="px-6 py-2.5 bg-agro-green text-black font-bold rounded-full hover:bg-green-400 transition-all shadow-[0_0_15px_rgba(0,214,50,0.2)] flex items-center gap-2 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    NUEVO CLIENTE
                </a>
            </div>

            <div class="bg-agro-card rounded-2xl border border-white/5 overflow-hidden shadow-2xl">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm whitespace-nowrap">
                        <thead class="bg-agro-card text-xs uppercase tracking-wider text-gray-500 font-semibold border-b border-white/5">
                            <tr>
                                <th class="px-6 py-5">Cliente</th>
                                <th class="px-6 py-5">Contacto</th>
                                <th class="px-6 py-5">Fechas</th>
                                <th class="px-6 py-5 text-right">Acciones</th>
                            </tr>
                        </thead>
                        
                        <tbody class="divide-y divide-white/5">
                            @foreach($customers as $customer)
                            <tr class="hover:bg-white/[0.02] transition-colors">
                                
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-4">
                                        <div class="w-10 h-10 rounded-full bg-gray-800/50 flex items-center justify-center text-gray-400 font-bold border border-white/10 uppercase">
                                            {{ substr($customer->name, 0, 1) }}{{ substr($customer->last_name, 0, 1) }}
                                        </div>
                                        <div>
                                            <div class="font-bold text-white text-base capitalize">
                                                {{ $customer->name }} {{ $customer->last_name }}
                                            </div>
                                            <div class="text-xs text-gray-500 mt-0.5 capitalize">
                                                {{ $customer->gender }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 text-gray-300">
                                    <div class="flex flex-col gap-2">
                                        <div class="flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-500">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-2.896-1.596-5.273-3.974-6.869-6.869l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                            </svg>
                                            {{ $customer->telephone ?? 'N/A' }}
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-500">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                            </svg>
                                            {{ $customer->email }}
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex flex-col gap-1.5">
                                        <span class="px-3 py-1 bg-white/5 border border-white/10 rounded-full text-xs text-gray-300 w-max">
                                            Reg: {{ $customer->registration_date ?? 'N/A' }}
                                        </span>
                                        <span class="text-xs text-gray-500 pl-1">
                                            Nac: {{ $customer->birth_date ?? 'N/A' }}
                                        </span>
                                    </div>
                                </td>

                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-4">
                                        <a href="{{ route('customers.show', $customer->id) }}" class="text-gray-500 hover:text-white transition-colors" title="Ver">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </a>

                                        <a href="{{ route('customers.edit', $customer->id) }}" class="text-blue-500 hover:text-blue-400 transition-colors" title="Editar">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.89 1.112l-2.83.793c-.59.165-1.12-.33-1.09-1.04l.792-2.831a4.5 4.5 0 011.112-1.89l13.43-13.43zM16.862 4.487L19.5 7.125" />
                                            </svg>
                                        </a>

                                        <form id="form-delete-{{ $customer->id }}" action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="confirmarEliminacion({{ $customer->id }})" class="text-red-500 hover:text-red-400 transition-colors" title="Eliminar">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmarEliminacion(id) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "Todos sus datos y registros asociados podrían eliminarse (Cascada).",
                icon: 'warning',
                background: '#18181B',
                color: '#ffffff',
                showCancelButton: true,
                confirmButtonColor: '#EF4444',
                cancelButtonColor: '#3F3F46',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar',
                customClass: {
                    popup: 'border border-white/10 rounded-2xl shadow-2xl',
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('form-delete-' + id).submit();
                }
            })
        }
    </script>
</x-app-layout>