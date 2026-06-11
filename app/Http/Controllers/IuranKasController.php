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
}