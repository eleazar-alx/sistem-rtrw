<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Ketua RW') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Banner Welcome Gradient (Warna Ungu biar beda kasta sama RT) -->
            <div class="bg-gradient-to-r from-purple-600 to-indigo-700 rounded-2xl shadow-lg p-8 mb-8 text-white transform hover:scale-[1.01] transition-transform duration-300">
                <h1 class="text-3xl font-bold mb-2">Selamat bertugas, Pak RW! 🏢</h1>
                <p class="text-purple-100 text-lg opacity-90">Pantau seluruh kegiatan RT di wilayah Anda dari satu layar.</p>
            </div>

            <!-- Grid Menu -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <!-- Menu 1: Aktif (Meskipun datanya belum ada, kita kasih href="#" dulu) -->
                <a href="#" class="group bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-xl hover:border-purple-300 transition-all duration-300 transform hover:-translate-y-1">
                    <div class="w-14 h-14 bg-purple-50 text-purple-600 rounded-xl flex items-center justify-center mb-5 group-hover:scale-110 group-hover:bg-purple-600 group-hover:text-white transition-all duration-300">
                        <!-- Icon Bangunan -->
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <h3 class="font-bold text-xl text-gray-800 mb-2 group-hover:text-purple-600 transition-colors">Rekapitulasi RT</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Pantau jumlah warga dan laporan bulanan dari seluruh RT di wilayah Anda.</p>
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
                    <h3 class="font-bold text-xl text-gray-800 mb-2">Kas RW</h3>
                    <span class="inline-block px-3 py-1 bg-gray-200 text-gray-600 text-xs font-semibold rounded-full mt-1">Segera Hadir</span>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>