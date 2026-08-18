<x-app-layout>
    <x-slot name="header">
    <div class="flex items-center justify-between">
        <h2 class="font-semibold text-2x1 text-gray-800 leading-tight tracking-tight">
            {{ __('editar_cliente') }}
        </h2>
        <a href="{{ route('customers.index') }}" class="text-sm text-gray-500 hover:text-indigo-600 transition-colors font-medium">
            volver a la lista
        </a>
    </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-x1 sm:rounded-2x1 border border-gray-200">

            <form action="{{ route('customers.update', $customer->id) }}" method="POST" novalidate>
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nombre del cliente</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $customer->name) }}" maxlength="50" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors" placeholder="Ej. Desarrollo Web">
                    @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Correo electrónico</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $customer->email) }}" maxlength="50" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors" placeholder="Ej. Desarrollo Web">
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="telephone" class="block text-sm font-medium text-gray-700 mb-2">Teléfono</label>
                    <input type="number" id="telephone" name="telephone" value="{{ old('telephone', $customer->telephone) }}" maxlength="15" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors" placeholder="Ej. Desarrollo Web">
                    @error('telephone')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">Apellido</label>
                    <input type="text" id="last_name" name="last_name" value="{{ old('last_name', $customer->last_name) }}" maxlength="50" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors" placeholder="Ej. Desarrollo Web">
                    @error('last_name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="gender" class="block text-sm font-medium text-gray-700 mb-2">Género</label>
                    <select id="gender" name="gender" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                        <option value="">Seleccione un género</option>
                        <option value="male" {{ old('gender', $customer->gender) === 'male' ? 'selected' : '' }}>Masculino</option>
                        <option value="female" {{ old('gender', $customer->gender) === 'female' ? 'selected' : '' }}>Femenino</option>
                        <option value="other" {{ old('gender', $customer->gender) === 'other' ? 'selected' : '' }}>Otro</option>
                    </select>
                    @error('gender')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-6">
                    <label for="registration_date" class="block text-sm font-medium text-gray-700 mb-2">Fecha de registro</label>
                    <input type="date" id="registration_date" name="registration_date" value="{{ old('registration_date', $customer->registration_date) }}" maxlenght="10" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors" placeholder="Ej. Desarrollo Web">
                    @error('registration_date')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="birth_date" class="block text-sm font-medium text-gray-700 mb-2">Fecha de nacimiento</label>
                    <input type="date" id="birth_date" name="birth_date" value="{{ old('birth_date', $customer->birth_date) }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors" placeholder="Ej. Desarrollo Web">
                    @error('birth_date')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 transition-colors shadow-sm">
                        Actualizar Cliente
                    </button>
                </div>
            </form>
            </div>
        </div>
    </div>

    <script>
        function confirmarActualzacion(event) {
            event.preventDefault();

            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡Esta acción actualizará la información del cliente!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, actualizar',
                cancelButtonText: 'Cancelar',
                background: '#1e293b',
                color: '#ffffff',
                iconColor: '#facc15',
                customClass: {
                    popup: 'bg-gray-800 text-gray-300'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    event.target.submit();
                }
            });
        }

    </script>
</x-app-layout>


