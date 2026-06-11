<?php

namespace App\Http\Controllers;

use App\Models\IuranKas;
use Illuminate\Http\Request;

class IuranKasController extends Controller
{
    public function index()
    {
        // Tarik semua data iuran khusus buat RT yang lagi login
        $data_iuran = IuranKas::with('warga')
            ->where('perumahan_id', auth()->user()->perumahan_id)
            ->where('no_rt', auth()->user()->no_rt)
            ->where('no_rw', auth()->user()->no_rw)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('rt.iuran.index', compact('data_iuran'));
    }
    
    public function create()
    {
        // Tarik data warga khusus di RT ini buat pilihan dropdown
        $data_warga = \App\Models\User::where('perumahan_id', auth()->user()->perumahan_id)
            ->where('no_rt', auth()->user()->no_rt)
            ->where('no_rw', auth()->user()->no_rw)
            ->orderBy('name', 'asc')
            ->get();

        return view('rt.iuran.create', compact('data_warga'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'bulan' => 'required',
            'tahun' => 'required|integer',
            'nominal' => 'required|numeric',
            'status' => 'required',
        ]);

        // 2. Masukin ke database IuranKas
        IuranKas::create([
            'user_id' => $request->user_id,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'nominal' => $request->nominal,
            'status' => $request->status,
            'keterangan' => $request->keterangan,
            // Otomatis ngisi identitas RT biar datanya kaga nyasar ke RT lain
            'perumahan_id' => auth()->user()->perumahan_id,
            'no_rt' => auth()->user()->no_rt,
            'no_rw' => auth()->user()->no_rw,
        ]);

        return redirect()->route('rt.iuran.index')->with('success', 'Data iuran kas berhasil dicatat, Tot!');
    }
}