<nav x-data="{ open: false }" class="bg-agro-card border-b border-zinc-800 shadow-md">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-2 text-xl font-bold text-white hover:scale-105 transition">
                        <span class="text-agro-green text-2xl">☘</span> AGROFEX
                    </a>
                </div>

                <!-- Navigation Links (Desktop) -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out {{ request()->routeIs('dashboard') ? 'border-agro-green text-agro-green' : 'border-transparent text-gray-400 hover:text-white hover:border-gray-500' }}">
                        {{ __('Panel de Control') }}
                    </a>
                    
                    <a href="{{ route('producers.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out {{ request()->routeIs('producers.*') ? 'border-agro-green text-agro-green' : 'border-transparent text-gray-400 hover:text-white hover:border-gray-500' }}">
                        {{ __('Productores') }}
                    </a>

                    <a href="{{ route('products.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out {{ request()->routeIs('products.*') ? 'border-agro-green text-agro-green' : 'border-transparent text-gray-400 hover:text-white hover:border-gray-500' }}">
                        {{ __('Cosechas') }}
                    </a>
                </div>
            </div>

            <!-- Settings Dropdown (Desktop) - CONSTRUIDO A MANO -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <div class="relative" x-data="{ dropdownOpen: false }" @click.outside="dropdownOpen = false" @close.stop="dropdownOpen = false">
                    
                    <!-- Botón del Dropdown -->
                    <div @click="dropdownOpen = ! dropdownOpen">
                        <button class="inline-flex items-center px-4 py-2 border border-zinc-700 text-sm leading-4 font-medium rounded-md text-gray-300 bg-zinc-900 hover:text-white hover:border-agro-green focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-2">
                                <svg class="fill-current h-4 w-4 text-agro-green" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </div>

                    <!-- Contenido del Dropdown -->
                    <div x-show="dropdownOpen"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-95"
                            x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-95"
                            class="absolute z-50 mt-2 w-48 rounded-md shadow-2xl origin-top-right right-0"
                            style="display: none;"
                            @click="dropdownOpen = false">
                        
                        <!-- Caja del Dropdown Oscura -->
                        <div class="rounded-md border border-zinc-700 overflow-hidden py-1 bg-agro-card">
                            <a href="{{ route('profile.edit') }}" class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-300 hover:bg-zinc-800 hover:text-white transition duration-150 ease-in-out">
                                {{ __('Perfil') }}
                            </a>

                            <!-- Authentication (Botón Verde) -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-400 hover:bg-zinc-800 hover:text-agro-green transition duration-150 ease-in-out">
                                    {{ __('Cerrar Sesión') }}
                                </a>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Hamburger (Mobile Menu Button) -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-zinc-800 focus:outline-none focus:bg-zinc-800 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu (Mobile) -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-agro-dark border-b border-zinc-800">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('dashboard') }}" class="block w-full ps-3 pe-4 py-2 border-l-4 text-left text-base font-medium transition duration-150 ease-in-out {{ request()->routeIs('dashboard') ? 'border-agro-green text-agro-green bg-agro-green/10' : 'border-transparent text-gray-400 hover:text-white hover:bg-zinc-800' }}">
                {{ __('Panel de Control') }}
            </a>
            
            <a href="{{ route('producers.index') }}" class="block w-full ps-3 pe-4 py-2 border-l-4 text-left text-base font-medium transition duration-150 ease-in-out {{ request()->routeIs('producers.*') ? 'border-agro-green text-agro-green bg-agro-green/10' : 'border-transparent text-gray-400 hover:text-white hover:bg-zinc-800' }}">
                {{ __('Productores') }}
            </a>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-zinc-800">
            <div class="px-4">
                <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <a href="{{ route('profile.edit') }}" class="block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-left text-base font-medium text-gray-400 hover:text-white hover:bg-zinc-800 transition duration-150 ease-in-out">
                    {{ __('Perfil') }}
                </a>

                <!-- Authentication (Botón Verde en Móvil) -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-left text-base font-medium text-gray-400 hover:text-agro-green hover:bg-zinc-800 transition duration-150 ease-in-out">
                        {{ __('Cerrar Sesión') }}
                    </a>
                </form>
            </div>
        </div>
    </div>
</nav>