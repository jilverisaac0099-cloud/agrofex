<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf
        <div class="text-center mb-6">
            <h2 class="text-2xl font-bold text-white">Únete a Agrofex</h2>
            <p class="text-sm text-gray-400 mt-2">Crea tu cuenta para gestionar tus productos o compras.</p>
        </div>

        <!-- Name -->
        <div>
            <label for="name" class="block font-medium text-sm text-gray-300">Nombre Completo</label>
            <input id="name" class="block mt-1 w-full bg-agro-dark border-zinc-700 text-white focus:border-agro-green focus:ring-agro-green rounded-xl shadow-sm px-4 py-2.5" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500" />
        </div>

        <!-- Email Address -->
        <div>
            <label for="email" class="block font-medium text-sm text-gray-300">Correo Electrónico</label>
            <input id="email" class="block mt-1 w-full bg-agro-dark border-zinc-700 text-white focus:border-agro-green focus:ring-agro-green rounded-xl shadow-sm px-4 py-2.5" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block font-medium text-sm text-gray-300">Contraseña</label>
            <input id="password" class="block mt-1 w-full bg-agro-dark border-zinc-700 text-white focus:border-agro-green focus:ring-agro-green rounded-xl shadow-sm px-4 py-2.5" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block font-medium text-sm text-gray-300">Confirmar Contraseña</label>
            <input id="password_confirmation" class="block mt-1 w-full bg-agro-dark border-zinc-700 text-white focus:border-agro-green focus:ring-agro-green rounded-xl shadow-sm px-4 py-2.5" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500" />
        </div>

        <div class="flex flex-col gap-4 mt-8 pt-4 border-t border-zinc-800">
            <button type="submit" class="w-full flex justify-center items-center px-6 py-3 bg-agro-yellow border border-transparent rounded-full font-bold text-black uppercase tracking-wider hover:bg-yellow-500 transition ease-in-out duration-150">
                Crear Cuenta
            </button>

            <div class="text-center mt-2">
                <a class="text-sm text-gray-400 hover:text-white transition" href="{{ route('login') }}">
                    ¿Ya estás registrado? <span class="text-agro-green font-semibold">Inicia sesión</span>
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>       