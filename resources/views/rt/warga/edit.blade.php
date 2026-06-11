<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Warga') }}
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
                    <h2 class="text-2xl font-bold text-gray-900">Edit Data Warga</h2>
                    <p class="text-sm text-gray-500 mt-1">Perbarui data diri Bapak/Ibu <span class="font-bold text-gray-800">{{ $warga->name }}</span>.</p>
                </div>

                <form action="{{ route('rt.warga.update', $warga->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <!-- SECTION 1: IDENTITAS UTAMA -->
                    <h3 class="text-lg font-bold text-blue-700 mb-4 bg-blue-50 p-2 rounded-lg inline-block px-4">1. Identitas Utama</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nomor KK</label>
                            <input type="number" name="no_kk" value="{{ old('no_kk', $warga->no_kk) }}" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">NIK KTP</label>
                            <input type="number" name="nik" value="{{ old('nik', $warga->nik) }}" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ old('name', $warga->name) }}" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $warga->tempat_lahir) }}" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $warga->tanggal_lahir) }}" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                                    <option value="Laki-laki" {{ $warga->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ $warga->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Gol. Darah</label>
                                <select name="golongan_darah" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="-" {{ $warga->golongan_darah == '-' ? 'selected' : '' }}>-</option>
                                    <option value="A" {{ $warga->golongan_darah == 'A' ? 'selected' : '' }}>A</option>
                                    <option value="B" {{ $warga->golongan_darah == 'B' ? 'selected' : '' }}>B</option>
                                    <option value="AB" {{ $warga->golongan_darah == 'AB' ? 'selected' : '' }}>AB</option>
                                    <option value="O" {{ $warga->golongan_darah == 'O' ? 'selected' : '' }}>O</option>
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
                                @foreach(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'] as $agama)
                                    <option value="{{ $agama }}" {{ $warga->agama == $agama ? 'selected' : '' }}>{{ $agama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Pendidikan</label>
                            <select name="pendidikan" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                                @foreach(['Tidak/Belum Sekolah', 'SD/Sederajat', 'SMP/Sederajat', 'SMA/Sederajat', 'D1/D2/D3', 'S1/D4', 'S2', 'S3'] as $pendidikan)
                                    <option value="{{ $pendidikan }}" {{ $warga->pendidikan == $pendidikan ? 'selected' : '' }}>{{ $pendidikan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Pekerjaan</label>
                            <input type="text" name="pekerjaan" value="{{ old('pekerjaan', $warga->pekerjaan) }}" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Status Perkawinan</label>
                            <select name="status_perkawinan" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                                @foreach(['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati'] as $status)
                                    <option value="{{ $status }}" {{ $warga->status_perkawinan == $status ? 'selected' : '' }}>{{ $status }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- SECTION 3: KELUARGA & SISTEM -->
                    <h3 class="text-lg font-bold text-blue-700 mb-4 bg-blue-50 p-2 rounded-lg inline-block px-4">3. Data Orang Tua & Status Tinggal</h3>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Ayah</label>
                            <input type="text" name="nama_ayah" value="{{ old('nama_ayah', $warga->nama_ayah) }}" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Ibu</label>
                            <input type="text" name="nama_ibu" value="{{ old('nama_ibu', $warga->nama_ibu) }}" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Status dlm Keluarga</label>
                            <select name="status_keluarga" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                                @foreach(['Kepala Keluarga', 'Istri', 'Anak', 'Lainnya'] as $status_keluarga)
                                    <option value="{{ $status_keluarga }}" {{ $warga->status_keluarga == $status_keluarga ? 'selected' : '' }}>{{ $status_keluarga }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Tipe Warga</label>
                            <select name="tipe_warga" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                                <option value="Lokal" {{ $warga->tipe_warga == 'Lokal' ? 'selected' : '' }}>Lokal (Domisili Tetap)</option>
                                <option value="Pendatang" {{ $warga->tipe_warga == 'Pendatang' ? 'selected' : '' }}>Pendatang (Kos/Kontrak)</option>
                            </select>
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex items-center justify-end gap-4 border-t border-gray-100 pt-6">
                        <a href="{{ route('rt.warga.index') }}" class="text-gray-500 font-semibold hover:text-gray-800 px-4 py-2">Batal</a>
                        <button type="submit" class="bg-blue-600 text-white px-8 py-2.5 rounded-xl font-bold hover:bg-blue-700 hover:shadow-lg transition-all duration-200 active:scale-95">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>