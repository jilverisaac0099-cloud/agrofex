<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agrofex - Eco-Mercado Digital</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-agro-dark text-white font-sans antialiased selection:bg-agro-green selection:text-white">
    
    <!-- Navbar -->
    <nav class="absolute top-0 w-full z-50 px-6 py-4 flex justify-between items-center">
        <div class="flex items-center gap-2 text-2xl font-bold text-white">
            <span class="text-agro-yellow text-3xl">☘</span> AGROFEX
        </div>
        <div class="hidden md:flex gap-8 text-sm font-medium text-gray-300">
            <a href="#" class="hover:text-agro-green transition">¿Cómo funciona?</a>
            <a href="#" class="hover:text-agro-green transition">Sobre nosotros</a>
            <a href="#" class="hover:text-agro-green transition">Blog / Noticias</a>
            <a href="#" class="hover:text-agro-green transition">Contacto</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative pt-32 pb-20 px-6 min-h-[80vh] flex flex-col justify-center bg-cover bg-center" style="background-image: linear-gradient(to bottom, rgba(9,9,11,0.8), rgba(9,9,11,1)), url('https://images.unsplash.com/photo-1625246333195-78d9c38ad449?q=80&w=1920&auto=format&fit=crop');">
        <div class="max-w-7xl mx-auto w-full grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-6 z-10">
                <p class="text-agro-green font-semibold tracking-wide uppercase">Conectamos el campo</p>
                <h1 class="text-5xl md:text-7xl font-extrabold leading-tight">
                    Con nuevas <br>oportunidades
                </h1>
                <p class="text-gray-400 max-w-md text-lg">
                    Una plataforma digital para pequeños agro-productores y venta directa de productos frescos de forma segura.
                </p>
                <div class="flex gap-4 pt-4">
                    <a href="{{ route('register') }}" class="bg-agro-yellow text-black px-8 py-3 rounded-full font-bold hover:bg-yellow-500 transition shadow-[0_0_15px_rgba(255,193,7,0.4)]">
                        Únete a Agrofex
                    </a>
                    <a href="{{ route('login') }}" class="border border-white text-white px-8 py-3 rounded-full font-bold hover:bg-white hover:text-black transition">
                        Iniciar sesión
                    </a>
                </div>
            </div>
            <!-- Mapa Gráfico Simplificado (Placeholder visual) -->
            <div class="hidden lg:block relative h-96 w-full">
                <!-- Aquí iría la imagen del mapa de la referencia -->
                <div class="absolute right-0 w-[500px] h-[500px] bg-agro-green/10 rounded-full blur-3xl -z-10"></div>
            </div>
        </div>
    </section>

    <!-- ¿Cómo funciona? -->
    <section class="py-24 px-6 bg-agro-dark">
        <div class="max-w-7xl mx-auto text-center space-y-16">
            <div class="space-y-4">
                <h2 class="text-3xl md:text-4xl font-bold">¿Cómo <span class="border-b-4 border-agro-green pb-1">funciona</span>?</h2>
                <p class="text-gray-400">Un proceso simple para conectar directamente con el campo.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 relative">
                <!-- Línea conectora (Desktop) -->
                <div class="hidden md:block absolute top-1/2 left-0 w-full h-0.5 bg-agro-green-dark/30 -translate-y-1/2 z-0"></div>
                
                <!-- Cards -->
                @php
                    $steps = [
                        ['num' => '1', 'title' => 'Regístrate', 'desc' => 'Crea tu cuenta como productor o cliente.'],
                        ['num' => '2', 'title' => 'Descubre', 'desc' => 'Explora los productos disponibles.'],
                        ['num' => '3', 'title' => 'Conecta', 'desc' => 'Comunícate directamente.'],
                        ['num' => '4', 'title' => 'Compra', 'desc' => 'Realiza un pago y recibe tu pedido.']
                    ];
                @endphp

                @foreach($steps as $step)
                <div class="bg-agro-card p-8 rounded-2xl border border-zinc-800 z-10 hover:border-agro-green transition group flex flex-col items-center text-center">
                    <div class="w-20 h-20 rounded-full border-2 border-agro-green flex items-center justify-center mb-6 bg-agro-dark group-hover:bg-agro-green/10 transition">
                        <span class="text-3xl font-bold text-agro-green">{{ $step['num'] }}</span>
                    </div>
                    <h3 class="text-xl font-bold mb-2">{{ $step['title'] }}</h3>
                    <p class="text-sm text-gray-400">{{ $step['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Sobre Agrofex -->
    <section class="py-24 px-6 bg-[#0c0c0e]">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="space-y-6">
                <p class="text-agro-green font-bold uppercase tracking-wider text-sm">Sobre Agrofex</p>
                <h2 class="text-4xl font-bold leading-tight">Conectamos personas,<br>impulsamos el campo.</h2>
                <p class="text-gray-400 leading-relaxed">
                    Agrofex es un ecosistema digital creado para empoderar a los pequeños productores y agricultores, ofreciéndoles un canal de venta directo y justo. Eliminamos los intermediarios innecesarios para que el productor reciba mayores beneficios y el consumidor obtenga productos frescos a precios accesibles, reduciendo al mismo tiempo el desperdicio de las cosechas.
                </p>
            </div>
            <div class="relative">
                <div class="absolute inset-0 bg-agro-green/20 blur-2xl rounded-full"></div>
                <img src="https://images.unsplash.com/photo-1595841696650-6f29ceee588b?q=80&w=800&auto=format&fit=crop" alt="Agricultores" class="relative rounded-3xl border border-zinc-800 shadow-2xl">
            </div>
        </div>
    </section>

    <!-- Todo lo que necesitas (Grid Características) -->
    <section class="py-24 px-6 bg-agro-dark border-b border-zinc-800">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-16 items-center">
            <div class="lg:col-span-1 space-y-6">
                <h2 class="text-4xl font-bold leading-tight">Todo lo que necesitas<br>para comercializar</h2>
                <p class="text-gray-400">Accede a un conjunto de herramientas diseñadas para gestionar y hacer crecer tu negocio agropecuario.</p>
                <button class="flex items-center gap-2 text-agro-green border border-agro-green px-6 py-2 rounded-full hover:bg-agro-green hover:text-black transition font-semibold">
                    Conocer más →
                </button>
            </div>
            
            <div class="lg:col-span-2 grid grid-cols-2 md:grid-cols-3 gap-6">
                <!-- Icon Cards -->
                @for ($i = 0; $i < 6; $i++)
                <div class="bg-agro-card aspect-square rounded-2xl border border-zinc-800 flex items-center justify-center p-6 hover:border-agro-green transition cursor-pointer group">
                    <div class="w-16 h-16 rounded-xl bg-agro-dark flex items-center justify-center text-agro-green group-hover:scale-110 transition duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[#09090b] pt-16 pb-8 px-6 border-t border-zinc-800 text-sm">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
            <div class="col-span-1 md:col-span-2 space-y-4">
                <div class="flex items-center gap-2 text-xl font-bold text-white mb-4">
                    <span class="text-agro-yellow text-2xl">☘</span> AGROFEX
                </div>
                <p class="text-gray-500 max-w-sm">
                    Agrofex es un mercado digital diseñado para impulsar a los pequeños productores y reducir el desperdicio de cosechas.
                </p>
            </div>
            <div>
                <h4 class="font-semibold text-white mb-4">Plataforma</h4>
                <ul class="space-y-2 text-gray-500">
                    <li><a href="#" class="hover:text-agro-green">Cómo comprar</a></li>
                    <li><a href="#" class="hover:text-agro-green">Cómo vender</a></li>
                    <li><a href="#" class="hover:text-agro-green">Precios</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold text-white mb-4">Compañía</h4>
                <ul class="space-y-2 text-gray-500">
                    <li><a href="#" class="hover:text-agro-green">Sobre nosotros</a></li>
                    <li><a href="#" class="hover:text-agro-green">Contacto</a></li>
                    <li><a href="#" class="hover:text-agro-green">Términos legales</a></li>
                </ul>
            </div>
        </div>
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center text-gray-600 border-t border-zinc-800 pt-8">
            <p>&copy; 2026 Agrofex. Todos los derechos reservados.</p>
            <div class="flex gap-4 mt-4 md:mt-0">
                <a href="#" class="hover:text-white">Facebook</a>
                <a href="#" class="hover:text-white">Instagram</a>
            </div>
        </div>
    </footer>

</body>
</html>