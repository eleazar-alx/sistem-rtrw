<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('rt.iuran.index') }}" class="text-gray-500 hover:text-gray-700 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Catat Iuran Baru') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-8">
                    <form action="#" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Pilih Warga -->
                            <div class="col-span-1 md:col-span-2">
                                <label for="user_id" class="block text-sm font-bold text-gray-700 mb-2">Pilih Warga (Yang Bayar)</label>
                                <select name="user_id" id="user_id" class="w-full border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-xl shadow-sm" required>
                                    <option value="">-- Pilih Warga --</option>
                                    @foreach ($data_warga as $warga)
                                        <option value="{{ $warga->id }}">{{ $warga->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Bulan & Tahun -->
                            <div>
                                <label for="bulan" class="block text-sm font-bold text-gray-700 mb-2">Bulan</label>
                                <select name="bulan" id="bulan" class="w-full border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-xl shadow-sm" required>
                                    <option value="Januari">Januari</option>
                                    <option value="Februari">Februari</option>
                                    <option value="Maret">Maret</option>
                                    <option value="April">April</option>
                                    <option value="Mei">Mei</option>
                                    <option value="Juni" selected>Juni</option>
                                    <option value="Juli">Juli</option>
                                    <option value="Agustus">Agustus</option>
                                    <option value="September">September</option>
                                    <option value="Oktober">Oktober</option>
                                    <option value="November">November</option>
                                    <option value="Desember">Desember</option>
                                </select>
                            </div>
                            
                            <div>
                                <label for="tahun" class="block text-sm font-bold text-gray-700 mb-2">Tahun</label>
                                <input type="number" name="tahun" id="tahun" value="{{ date('Y') }}" class="w-full border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-xl shadow-sm" required>
                            </div>

                            <!-- Nominal -->
                            <div>
                                <label for="nominal" class="block text-sm font-bold text-gray-700 mb-2">Nominal (Rp)</label>
                                <input type="number" name="nominal" id="nominal" placeholder="Contoh: 50000" class="w-full border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-xl shadow-sm" required>
                            </div>

                            <!-- Status -->
                            <div>
                                <label for="status" class="block text-sm font-bold text-gray-700 mb-2">Status Pembayaran</label>
                                <select name="status" id="status" class="w-full border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-xl shadow-sm" required>
                                    <option value="Lunas">Lunas</option>
                                    <option value="Belum Lunas">Belum Lunas / Nyicil</option>
                                </select>
                            </div>

                            <!-- Keterangan -->
                            <div class="col-span-1 md:col-span-2">
                                <label for="keterangan" class="block text-sm font-bold text-gray-700 mb-2">Keterangan / Catatan (Opsional)</label>
                                <textarea name="keterangan" id="keterangan" rows="3" class="w-full border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-xl shadow-sm" placeholder="Contoh: Titip ke satpam..."></textarea>
                            </div>
                        </div>

                        <div class="flex justify-end pt-6 border-t border-gray-100">
                            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-8 rounded-xl shadow-md transition-all active:scale-95 flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                Simpan Data Iuran
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>