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
                            <tr class="hover:bg-green-50/50 transition-colors duration-200">
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
                                    <a href="#" class="text-blue-600 hover:text-blue-900 text-sm font-bold">Detail</a>
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