<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Data Warga RT') }}
            </h2>
            <!-- Tombol Tambah Pindah ke Kanan Atas Biar Rapih -->
            <a href="{{ route('rt.warga.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 px-5 rounded-xl shadow-md transition-all flex items-center gap-2 active:scale-95">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah Warga
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- Loooping Per Kartu Keluarga -->
            @forelse ($data_warga as $no_kk => $keluarga)
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow duration-300">
                    
                    <!-- Header Kartu Keluarga -->
                    <div class="bg-gradient-to-r from-blue-50 to-white px-6 py-4 border-b border-gray-100 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                        <div>
                            <h3 class="text-lg font-extrabold text-blue-900 flex items-center gap-2">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                Keluarga 
                                @php
                                    // Pinter-pinteran nyari nama Kepala Keluarga
                                    $kepala_keluarga = $keluarga->where('status_keluarga', 'Kepala Keluarga')->first();
                                    $nama_kk = $kepala_keluarga ? $kepala_keluarga->name : 'Belum Set Kepala Keluarga';
                                @endphp
                                <span class="text-gray-900">{{ $nama_kk }}</span>
                            </h3>
                            <p class="text-sm text-gray-500 font-medium mt-1 ml-8">Nomor KK: <span class="text-blue-600 font-semibold">{{ $no_kk ?: 'Kosong / Warga Lama' }}</span></p>
                        </div>
                        <span class="bg-blue-100 text-blue-700 py-1.5 px-4 rounded-full text-sm font-bold shadow-sm">
                            {{ $keluarga->count() }} Anggota Keluarga
                        </span>
                    </div>

                    <!-- Tabel Anggota Keluarga -->
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider border-b border-gray-100">
                                    <th class="px-6 py-4 font-semibold">Nama & NIK</th>
                                    <th class="px-6 py-4 font-semibold">Status Keluarga</th>
                                    <th class="px-6 py-4 font-semibold text-center">L/P</th>
                                    <th class="px-6 py-4 font-semibold">Tipe Warga</th>
                                    <th class="px-6 py-4 font-semibold text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50">
                                @foreach ($keluarga as $warga)
                                <tr class="hover:bg-blue-50/50 transition-colors duration-200">
                                    <td class="px-6 py-4">
                                        <div class="font-bold text-gray-900">{{ $warga->name }}</div>
                                        <div class="text-xs text-gray-500 font-mono mt-0.5">{{ $warga->nik ?: 'NIK Belum diisi' }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold 
                                            {{ $warga->status_keluarga == 'Kepala Keluarga' ? 'bg-purple-100 text-purple-700' : 'bg-gray-100 text-gray-700' }}">
                                            {{ $warga->status_keluarga ?: '-' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-center font-bold text-gray-700">
                                        {{ $warga->jenis_kelamin == 'Laki-laki' ? 'L' : ($warga->jenis_kelamin == 'Perempuan' ? 'P' : '-') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold 
                                            {{ $warga->tipe_warga == 'Lokal' ? 'bg-green-100 text-green-700' : 'bg-orange-100 text-orange-700' }}">
                                            {{ $warga->tipe_warga ?: '-' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-right space-x-2">
                                        <a href="{{ route('rt.warga.edit', $warga->id) }}" class="inline-block text-blue-600 hover:text-white border border-blue-600 hover:bg-blue-600 px-3 py-1.5 rounded-lg text-sm font-bold transition-all duration-200">Edit</a>
                                        <form action="{{ route('rt.warga.destroy', $warga->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin mau hapus {{ $warga->name }} dari KK ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-white border border-red-600 hover:bg-red-600 px-3 py-1.5 rounded-lg text-sm font-bold transition-all duration-200">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @empty
                <!-- Tampilan Kalau Data Kosong -->
                <div class="bg-white p-12 text-center rounded-2xl shadow-sm border border-gray-100">
                    <svg class="mx-auto h-16 w-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    <h3 class="text-xl font-bold text-gray-900 mb-1">Belum Ada Data Warga</h3>
                    <p class="text-gray-500 mb-6">Warga RT lu masih kosong nih Tot, buruan didata!</p>
                    <a href="{{ route('rt.warga.create') }}" class="inline-flex items-center rounded-xl bg-blue-600 px-5 py-3 text-sm font-bold text-white shadow-lg hover:bg-blue-700 hover:shadow-xl transition-all active:scale-95">
                        Tambah Data Sekarang
                    </a>
                </div>
            @endforelse

        </div>
    </div>

    <!-- Script SweetAlert -->
    @push('scripts')
    <script>
        @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Mantap!',
            text: '{!! session('success') !!}',
            confirmButtonColor: '#2563eb',
            confirmButtonText: 'Lanjut'
        });
        @endif
    </script>
    @endpush
</x-app-layout>