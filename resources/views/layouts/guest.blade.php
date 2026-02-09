<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>TifawinSouk | {{ $title ?? 'Authentication' }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            .auth-bg {
                background: linear-gradient(135deg, #220901 0%, #941b0c 100%);
            }
            .auth-card {
                background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(255, 255, 255, 0.98) 100%);
                backdrop-filter: blur(10px);
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 auth-bg">
            <!-- Decorative elements -->
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
                <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-[#f6aa1c]/20 to-[#bc3908]/20 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-gradient-to-br from-[#941b0c]/20 to-[#621708]/20 rounded-full blur-3xl"></div>
            </div>
            
            <div class="w-full max-w-md relative z-10">
                <!-- Logo -->
                <div class="flex justify-center mb-8">
                    <a href="/" class="flex flex-col items-center">
                        <div class="w-16 h-16 bg-gradient-to-br from-[#f6aa1c] to-[#bc3908] rounded-xl flex items-center justify-center shadow-lg mb-4">
                            <span class="text-[#220901] font-bold text-2xl">TS</span>
                        </div>
                        <span class="text-white font-bold text-2xl tracking-wider">TifawinSouk</span>
                        <span class="text-[#f6aa1c] text-sm mt-1">E-Commerce Platform</span>
                    </a>
                </div>

                <!-- Auth Card -->
                <div class="auth-card w-full sm:max-w-md mt-6 px-8 py-8 rounded-2xl shadow-2xl overflow-hidden sm:rounded-2xl">
                    {{ $slot }}
                </div>
                
                <!-- Back to site link -->
                <div class="mt-6 text-center">
                    <a href="{{ url('/') }}" class="text-[#f6aa1c] hover:text-white text-sm transition-colors duration-300 inline-flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Back to main site
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>