<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Ketua RT') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Banner Welcome Gradient -->
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-2xl shadow-lg p-8 mb-8 text-white transform hover:scale-[1.01] transition-transform duration-300">
                <h1 class="text-3xl font-bold mb-2">Selamat bertugas, Pak RT! ☕</h1>
                <p class="text-blue-100 text-lg opacity-90">Apa yang ingin Anda lakukan hari ini?</p>
            </div>

            <!-- Grid Menu -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Menu 1: Aktif -->
                <a href="{{ route('rt.warga.index') }}" class="group bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-xl hover:border-blue-300 transition-all duration-300 transform hover:-translate-y-1">
                    <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center mb-5 group-hover:scale-110 group-hover:bg-blue-600 group-hover:text-white transition-all duration-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <h3 class="font-bold text-xl text-gray-800 mb-2 group-hover:text-blue-600 transition-colors">Ngatur Data Warga</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Kelola daftar warga, tambah penghuni baru, dan perbarui data di RT Anda.</p>
                </a>

                <!-- Menu 2: Segera Hadir -->
                <div class="bg-gray-50 p-6 rounded-2xl border border-gray-100 opacity-70 cursor-not-allowed">
                    <div class="w-14 h-14 bg-gray-200 text-gray-400 rounded-xl flex items-center justify-center mb-5">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <h3 class="font-bold text-xl text-gray-800 mb-2">Laporan Keamanan</h3>
                    <span class="inline-block px-3 py-1 bg-gray-200 text-gray-600 text-xs font-semibold rounded-full mt-1">Segera Hadir</span>
                </div>

                <!-- Menu 3: Segera Hadir -->
                <div class="bg-gray-50 p-6 rounded-2xl border border-gray-100 opacity-70 cursor-not-allowed">
                    <div class="w-14 h-14 bg-gray-200 text-gray-400 rounded-xl flex items-center justify-center mb-5">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="font-bold text-xl text-gray-800 mb-2">Iuran Kas RT</h3>
                    <span class="inline-block px-3 py-1 bg-gray-200 text-gray-600 text-xs font-semibold rounded-full mt-1">Segera Hadir</span>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>