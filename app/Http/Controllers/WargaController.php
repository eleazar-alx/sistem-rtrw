<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class WargaController extends Controller
{
    public function create()
    {
        return view('rt.warga.create');
    }    

    // Fungsi buat baca data (Index)
    public function index()
    {
        // Tarik warga yang perumahan, RT, dan RW-nya sama persis kaya yang login
        $data_warga = User::where('role', 'warga')
                          ->where('perumahan_id', auth()->user()->perumahan_id)
                          ->where('no_rt', auth()->user()->no_rt)
                          ->where('no_rw', auth()->user()->no_rw)
                          ->get()
                          ->groupBy('no_kk');

        return view('rt.warga.index', compact('data_warga'));
    }

    public function store(Request $request)
    {
        // 1. Validasi Super Lengkap Sesuai Form KK
        $request->validate([
            'no_kk' => 'required|string|max:20',
            'nik' => 'required|string|max:20|unique:users,nik',
            'name' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'golongan_darah' => 'required|in:A,B,AB,O,-',
            'agama' => 'required|string|max:50',
            'pendidikan' => 'required|string|max:100',
            'pekerjaan' => 'required|string|max:100',
            'status_perkawinan' => 'required|in:Belum Kawin,Kawin,Cerai Hidup,Cerai Mati',
            'status_keluarga' => 'required|in:Kepala Keluarga,Istri,Anak,Lainnya',
            'tipe_warga' => 'required|in:Lokal,Pendatang',
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'email' => 'nullable|email|unique:users,email', 
        ]);

        // Bikin email dummy kalau dikosongin
        $email = $request->email ?: strtolower(str_replace(' ', '', $request->name)) . $request->nik . '@warga.lokal';

        // 2. Simpan Semua Data ke Database (Termasuk RT & RW Otomatis!)
        User::create([
            'no_kk' => $request->no_kk,
            'nik' => $request->nik,
            'name' => $request->name,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'golongan_darah' => $request->golongan_darah,
            'agama' => $request->agama,
            'pendidikan' => $request->pendidikan,
            'pekerjaan' => $request->pekerjaan,
            'status_perkawinan' => $request->status_perkawinan,
            'status_keluarga' => $request->status_keluarga,
            'tipe_warga' => $request->tipe_warga,
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'email' => $email,
            'password' => \Illuminate\Support\Facades\Hash::make('warga123'),
            'role' => 'warga',
            
            // INI DIA KUNCINYA BIAR GAK JADI WARGA GAIB TOT! 👇
            'perumahan_id' => auth()->user()->perumahan_id,
            'no_rt' => auth()->user()->no_rt,
            'no_rw' => auth()->user()->no_rw,
        ]);

        return redirect()->route('rt.warga.index')->with('success', 'Data warga lengkap berhasil ditambahkan!');
    }

    // NAH INI DIA FUNGSI YANG TADI ILANG TOT! 👇
    public function edit($id)
    {
        $warga = User::findOrFail($id);
        return view('rt.warga.edit', compact('warga'));
    }

    public function update(Request $request, $id)
    {
        $warga = User::findOrFail($id);

        $request->validate([
            'no_kk' => 'required|string|max:20',
            // Pengecualian unik NIK buat user yang lagi diedit biar gak error
            'nik' => 'required|string|max:20|unique:users,nik,' . $warga->id,
            'name' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'golongan_darah' => 'required|in:A,B,AB,O,-',
            'agama' => 'required|string|max:50',
            'pendidikan' => 'required|string|max:100',
            'pekerjaan' => 'required|string|max:100',
            'status_perkawinan' => 'required|in:Belum Kawin,Kawin,Cerai Hidup,Cerai Mati',
            'status_keluarga' => 'required|in:Kepala Keluarga,Istri,Anak,Lainnya',
            'tipe_warga' => 'required|in:Lokal,Pendatang',
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
        ]);

        $warga->update([
            'no_kk' => $request->no_kk,
            'nik' => $request->nik,
            'name' => $request->name,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'golongan_darah' => $request->golongan_darah,
            'agama' => $request->agama,
            'pendidikan' => $request->pendidikan,
            'pekerjaan' => $request->pekerjaan,
            'status_perkawinan' => $request->status_perkawinan,
            'status_keluarga' => $request->status_keluarga,
            'tipe_warga' => $request->tipe_warga,
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
        ]);

        return redirect()->route('rt.warga.index')->with('success', 'Data warga berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $warga = User::findOrFail($id);
        $warga->delete();
        return redirect()->route('rt.warga.index')->with('success', 'Warga berhasil dihapus.');
    }
}