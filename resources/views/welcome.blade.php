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
    <div class="min-h-screen relative flex flex-col">
        
        <div class="w-full flex justify-end p-6 sm:p-8 space-x-4 items-center">
            @auth
                <a href="{{ url('/dashboard') }}" class="font-bold text-gray-600 hover:text-gray-900 transition">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="font-bold text-gray-600 hover:text-gray-900 transition">Log in</a>
                <a href="{{ route('register') }}" class="bg-white border border-gray-200 text-gray-700 font-bold py-2 px-4 rounded hover:bg-gray-50 shadow-sm transition">Register</a>
            @endauth
        </div>

        <div class="flex-1 flex items-center justify-center p-6">
            
            <div class="max-w-5xl w-full bg-white rounded-xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 overflow-hidden flex flex-col md:flex-row">
                
                <div class="p-10 md:p-14 md:w-1/2 flex flex-col justify-center">
                    <h2 class="text-xl sm:text-2xl font-bold text-gray-900 mb-3">Mari mulai mengelola</h2>
                    <p class="text-sm text-gray-500 mb-8 leading-relaxed">
                        Sistem informasi RT & RW ini kaya akan fitur untuk mempermudah tugas pengurus. Kami menyarankan Anda memulai dari langkah di bawah ini.
                    </p>
                    
                    <div class="space-y-6 mb-8 pl-2 border-l-2 border-gray-100">
                        <div class="flex items-start relative">
                            <div class="absolute -left-[13px] top-1.5 w-6 h-6 bg-white rounded-full flex items-center justify-center border-2 border-[#ff2d20]">
                                <div class="w-2 h-2 bg-[#ff2d20] rounded-full"></div>
                            </div>
                            <div class="ml-6">
                                <a href="{{ route('login') }}" class="text-sm font-bold text-gray-900 hover:text-[#ff2d20] flex items-center gap-1 group transition-colors">
                                    Masuk sebagai Pengurus <span class="text-[#ff2d20] group-hover:translate-x-1 transition-transform">↗</span>
                                </a>
                            </div>
                        </div>
                        
                        <div class="flex items-start relative">
                            <div class="absolute -left-[13px] top-1.5 w-6 h-6 bg-white rounded-full flex items-center justify-center border-2 border-gray-200">
                            </div>
                            <div class="ml-6">
                                <a href="{{ route('register') }}" class="text-sm font-bold text-gray-900 hover:text-[#ff2d20] flex items-center gap-1 group transition-colors">
                                    Daftarkan Lingkungan Baru <span class="text-[#ff2d20] group-hover:translate-x-1 transition-transform">↗</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div>
                        <a href="{{ route('login') }}" class="inline-block bg-[#1a202c] hover:bg-black text-white text-sm font-bold px-6 py-3 rounded shadow transition-colors">
                            Mulai Sekarang
                        </a>
                    </div>
                </div>

                <div class="md:w-1/2 bg-[#fdfdfd] relative overflow-hidden flex items-center justify-center min-h-[300px] border-l border-gray-50">
                    <div class="absolute inset-0" style="background-image: radial-gradient(#e5e7eb 1px, transparent 1px); background-size: 20px 20px;"></div>
                    
                    <div class="relative z-10 flex flex-col items-center rotate-[-10deg] scale-110">
                        <span class="text-[7rem] sm:text-[9rem] font-black leading-none tracking-tighter absolute -ml-8 -mt-8 select-none text-blue-100">RTRW</span>
                        <span class="text-[7rem] sm:text-[9rem] font-black leading-none tracking-tighter absolute -ml-4 -mt-4 select-none text-blue-200">RTRW</span>
                        <span class="text-[7rem] sm:text-[9rem] font-black leading-none tracking-tighter relative drop-shadow-xl select-none" style="background: -webkit-linear-gradient(45deg, #1d4ed8, #ef4444); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">RTRW</span>
                    </div>
                </div>
                
            </div>
        </div>
        
    </div>
</body>
</html>