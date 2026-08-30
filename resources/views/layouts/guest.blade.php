<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Agrofex') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-300 antialiased bg-agro-dark selection:bg-agro-green selection:text-white">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative overflow-hidden">
            <!-- Efecto de luz de fondo -->
            <div class="absolute top-1/4 -translate-y-1/2 w-[600px] h-[600px] bg-agro-green/5 rounded-full blur-3xl -z-10"></div>
            
            <div>
                <a href="/" class="flex items-center gap-2 text-3xl font-bold text-white mb-8 hover:scale-105 transition">
                    <span class="text-agro-yellow text-4xl">☘</span> AGROFEX
                </a>
            </div>

            <div class="w-full sm:max-w-md px-8 py-10 bg-agro-card border border-zinc-800 shadow-2xl sm:rounded-3xl z-10">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>