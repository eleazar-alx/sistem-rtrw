<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Data Warga') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-4">
                <a href="{{ route('rt.warga.index') }}" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-blue-600 transition-colors duration-200">
                    <svg class="w-5 h-5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Daftar Warga
                </a>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100">
                <div class="mb-8 border-b border-gray-200 pb-4">
                    <h2 class="text-2xl font-bold text-gray-900">Form Pendaftaran Warga Baru</h2>
                    <p class="text-sm text-gray-500 mt-1">Harap isi data dengan lengkap sesuai dengan dokumen Kartu Keluarga (KK) atau KTP yang berlaku.</p>
                </div>

                <form action="{{ route('rt.warga.store') }}" method="POST">
                    @csrf
                    
                    <!-- SECTION 1: IDENTITAS UTAMA -->
                    <h3 class="text-lg font-bold text-blue-700 mb-4 bg-blue-50 p-2 rounded-lg inline-block px-4">1. Identitas Utama</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nomor KK</label>
                            <input type="number" name="no_kk" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">NIK KTP</label>
                            <input type="number" name="nik" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                            <input type="text" name="name" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                                    <option value="">Pilih...</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Gol. Darah</label>
                                <select name="golongan_darah" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="-">Tidak Tahu / -</option>
                                    <option value="A">A</option><option value="B">B</option><option value="AB">AB</option><option value="O">O</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- SECTION 2: LATAR BELAKANG -->
                    <h3 class="text-lg font-bold text-blue-700 mb-4 bg-blue-50 p-2 rounded-lg inline-block px-4">2. Latar Belakang</h3>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Agama</label>
                            <select name="agama" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                                <option value="Islam">Islam</option><option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option><option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option><option value="Konghucu">Konghucu</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Pendidikan</label>
                            <select name="pendidikan" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                                <option value="Tidak/Belum Sekolah">Tidak/Belum Sekolah</option><option value="SD/Sederajat">SD/Sederajat</option>
                                <option value="SMP/Sederajat">SMP/Sederajat</option><option value="SMA/Sederajat">SMA/Sederajat</option>
                                <option value="D1/D2/D3">D1/D2/D3</option><option value="S1/D4">S1/D4</option>
                                <option value="S2">S2</option><option value="S3">S3</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Pekerjaan</label>
                            <input type="text" name="pekerjaan" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Karyawan Swasta, PNS, dll" required>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Status Perkawinan</label>
                            <select name="status_perkawinan" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                                <option value="Belum Kawin">Belum Kawin</option><option value="Kawin">Kawin</option>
                                <option value="Cerai Hidup">Cerai Hidup</option><option value="Cerai Mati">Cerai Mati</option>
                            </select>
                        </div>
                    </div>

                    <!-- SECTION 3: KELUARGA & SISTEM -->
                    <h3 class="text-lg font-bold text-blue-700 mb-4 bg-blue-50 p-2 rounded-lg inline-block px-4">3. Data Orang Tua & Status Tinggal</h3>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Ayah</label>
                            <input type="text" name="nama_ayah" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Ibu</label>
                            <input type="text" name="nama_ibu" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Status dlm Keluarga</label>
                            <select name="status_keluarga" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                                <option value="Kepala Keluarga">Kepala Keluarga</option><option value="Istri">Istri</option>
                                <option value="Anak">Anak</option><option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Tipe Warga</label>
                            <select name="tipe_warga" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                                <option value="Lokal">Lokal (Domisili Tetap)</option><option value="Pendatang">Pendatang (Kos/Kontrak)</option>
                            </select>
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex items-center justify-end gap-4 border-t border-gray-100 pt-6">
                        <a href="{{ route('rt.warga.index') }}" class="text-gray-500 font-semibold hover:text-gray-800 px-4 py-2">Batal</a>
                        <button type="submit" class="bg-blue-600 text-white px-8 py-2.5 rounded-xl font-bold hover:bg-blue-700 hover:shadow-lg transition-all duration-200 active:scale-95">
                            Simpan Data Warga
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>