<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Manajemen RT/RW</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-50 text-gray-900 font-[Figtree]">
    <div class="min-h-screen flex flex-col justify-center items-center p-6">
        <div class="max-w-3xl w-full text-center space-y-8">
            <div class="flex justify-center mb-8">
                <div class="w-24 h-24 bg-blue-600 rounded-3xl flex items-center justify-center shadow-2xl shadow-blue-600/30 rotate-3 hover:rotate-0 transition-transform duration-300">
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
            </div>

            <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-gray-900">
                Sistem Informasi <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">RT & RW</span> Modern
            </h1>
            
            <p class="text-lg md:text-xl text-gray-500 font-medium max-w-2xl mx-auto leading-relaxed">
                Kelola data warga, iuran kas, dan pelaporan lingkungan dengan mudah, cepat, dan transparan. Khusus untuk pengurus lingkungan yang ingin *go-digital*.
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-8">
                @auth
                    <a href="{{ url('/dashboard') }}" class="w-full sm:w-auto px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white rounded-2xl font-bold text-lg shadow-xl shadow-blue-600/20 transition-all active:scale-95">Masuk ke Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="w-full sm:w-auto px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white rounded-2xl font-bold text-lg shadow-xl shadow-blue-600/20 transition-all active:scale-95">Masuk (Login)</a>
                    
                    <a href="{{ route('register') }}" class="w-full sm:w-auto px-8 py-4 bg-white hover:bg-gray-50 text-gray-900 border-2 border-gray-200 rounded-2xl font-bold text-lg transition-all active:scale-95">Daftar Pengurus Baru</a>
                @endauth
            </div>
            
            <p class="text-sm text-gray-400 mt-12 font-medium">
                &copy; {{ date('Y') }} ALX Creative Studio. All rights reserved.
            </p>
        </div>
    </div>
</body>
</html>