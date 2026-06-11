<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Uang Kas & Iuran Warga') }}
            </h2>
            <a href="{{ route('rt.iuran.create') }}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2.5 px-5 rounded-xl shadow-md transition-all flex items-center gap-2 active:scale-95">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                Catat Iuran Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-gradient-to-r from-green-50 to-white px-6 py-4 border-b border-gray-100">
                    <h3 class="text-lg font-extrabold text-green-900 flex items-center gap-2">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Riwayat Pembayaran Kas
                    </h3>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider border-b border-gray-100">
                                <th class="px-6 py-4 font-semibold">Nama Warga</th>
                                <th class="px-6 py-4 font-semibold">Periode (Bulan/Tahun)</th>
                                <th class="px-6 py-4 font-semibold">Nominal</th>
                                <th class="px-6 py-4 font-semibold">Status</th>
                                <th class="px-6 py-4 font-semibold text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @forelse ($data_iuran as $iuran)
                            <!-- INI YANG DIGANTI TOT, ADA x-data="{ showModal: false }" -->
                            <tr x-data="{ showModal: false }" class="hover:bg-green-50/50 transition-colors duration-200">
                                <td class="px-6 py-4">
                                    <div class="font-bold text-gray-900">{{ $iuran->warga->name }}</div>
                                </td>
                                <td class="px-6 py-4 font-bold text-gray-700">
                                    {{ $iuran->bulan }} {{ $iuran->tahun }}
                                </td>
                                <td class="px-6 py-4 font-bold text-gray-900">
                                    Rp {{ number_format($iuran->nominal, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold 
                                        {{ $iuran->status == 'Lunas' ? 'bg-green-100 text-green-700' : ($iuran->status == 'Menunggu Konfirmasi' ? 'bg-orange-100 text-orange-700' : 'bg-red-100 text-red-700') }}">
                                        {{ $iuran->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <!-- INI TOMBOL DETAIL BUAT BUKA POPUP -->
                                    <button @click="showModal = true" type="button" class="text-blue-600 hover:text-blue-900 text-sm font-bold focus:outline-none">
                                        Detail
                                    </button>

                                    <!-- KODINGAN POPUP MODAL (Awalnya Sembunyi) -->
                                    <div x-show="showModal" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                        <!-- Background Item Transparan -->
                                        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:p-0">
                                            <div x-show="showModal" 
                                                 x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" 
                                                 x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" 
                                                 @click="showModal = false" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                                            <!-- Kotak Popup Putih -->
                                            <div x-show="showModal" 
                                                 x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" 
                                                 x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                                                 class="inline-block align-bottom bg-white rounded-3xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full relative z-10 border border-gray-100">
                                                
                                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                    <div class="sm:flex sm:items-start">
                                                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-50 sm:mx-0 sm:h-10 sm:w-10">
                                                            <svg class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                            </svg>
                                                        </div>
                                                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                                            <h3 class="text-xl font-extrabold text-gray-900 mb-5" id="modal-title">
                                                                Rincian Data Kas
                                                            </h3>
                                                            <div class="space-y-4">
                                                                <div class="flex justify-between border-b border-gray-100 pb-2">
                                                                    <span class="text-sm text-gray-500 font-medium">Pembayar</span>
                                                                    <span class="text-sm font-bold text-gray-900">{{ $iuran->warga->name }}</span>
                                                                </div>
                                                                <div class="flex justify-between border-b border-gray-100 pb-2">
                                                                    <span class="text-sm text-gray-500 font-medium">Periode Iuran</span>
                                                                    <span class="text-sm font-bold text-gray-900">{{ $iuran->bulan }} {{ $iuran->tahun }}</span>
                                                                </div>
                                                                <div class="flex justify-between border-b border-gray-100 pb-2">
                                                                    <span class="text-sm text-gray-500 font-medium">Nominal</span>
                                                                    <span class="text-sm font-extrabold text-gray-900">Rp {{ number_format($iuran->nominal, 0, ',', '.') }}</span>
                                                                </div>
                                                                <div class="flex justify-between border-b border-gray-100 pb-2">
                                                                    <span class="text-sm text-gray-500 font-medium">Status</span>
                                                                    <span class="text-sm font-bold {{ $iuran->status == 'Lunas' ? 'text-green-600' : 'text-red-600' }}">{{ $iuran->status }}</span>
                                                                </div>
                                                                <div class="flex justify-between border-b border-gray-100 pb-2">
                                                                    <span class="text-sm text-gray-500 font-medium">Tanggal Dicatat</span>
                                                                    <span class="text-sm font-bold text-gray-900">{{ $iuran->created_at->format('d M Y, H:i') }}</span>
                                                                </div>
                                                                <div class="pt-2 text-left">
                                                                    <span class="block text-sm text-gray-500 font-medium mb-2">Keterangan Tambahan</span>
                                                                    <div class="bg-gray-50 rounded-xl p-3.5 text-sm text-gray-700 font-semibold border border-gray-100">
                                                                        {{ $iuran->keterangan ?: 'Tidak ada catatan khusus yang dilampirkan.' }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Tombol Tutup -->
                                                <div class="bg-gray-50/80 px-4 py-4 sm:px-6 flex justify-end">
                                                    <button @click="showModal = false" type="button" class="w-full inline-flex justify-center rounded-xl border border-gray-300 shadow-sm px-6 py-2.5 bg-white text-base font-bold text-gray-700 hover:bg-gray-50 focus:outline-none transition-all sm:w-auto sm:text-sm active:scale-95">
                                                        Tutup Rincian
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- SELESAI KODINGAN POPUP -->
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center">
                                    <p class="text-gray-500 font-medium">Belum ada data uang kas yang masuk.</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>