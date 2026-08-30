<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf
        <div class="text-center mb-8">
            <h2 class="text-2xl font-bold text-white">Iniciar Sesión</h2>
            <p class="text-sm text-gray-400 mt-2">Bienvenido de nuevo al ecosistema digital.</p>
        </div>

        <!-- Email Address -->
        <div>
            <label for="email" class="block font-medium text-sm text-gray-300">Correo Electrónico</label>
            <input id="email" class="block mt-1 w-full bg-agro-dark border-zinc-700 text-white focus:border-agro-green focus:ring-agro-green rounded-xl shadow-sm px-4 py-3" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password" class="block font-medium text-sm text-gray-300">Contraseña</label>
            <input id="password" class="block mt-1 w-full bg-agro-dark border-zinc-700 text-white focus:border-agro-green focus:ring-agro-green rounded-xl shadow-sm px-4 py-3" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" type="checkbox" class="rounded bg-agro-dark border-zinc-700 text-agro-green focus:ring-agro-green focus:ring-offset-agro-card" name="remember">
                <span class="ms-2 text-sm text-gray-400">Recordarme en este equipo</span>
            </label>
        </div>

        <div class="flex flex-col gap-4 mt-6">
            <button type="submit" class="w-full flex justify-center items-center px-6 py-3 bg-agro-yellow border border-transparent rounded-full font-bold text-black uppercase tracking-wider hover:bg-yellow-500 transition ease-in-out duration-150">
                Entrar al sistema
            </button>

            @if (Route::has('password.request'))
                <div class="text-center">
                    <a class="underline text-sm text-gray-400 hover:text-white transition" href="{{ route('password.request') }}">
                        ¿Olvidaste tu contraseña?
                    </a>
                </div>
            @endif
        </div>
        
        <div class="mt-8 text-center text-sm text-gray-400 border-t border-zinc-800 pt-6">
            ¿No tienes cuenta? <a href="{{ route('register') }}" class="text-agro-green font-semibold hover:underline">Regístrate aquí</a>
        </div>
    </form>
</x-guest-layout>