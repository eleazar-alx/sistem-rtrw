<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\IuranKasController;

Route::get('/', function () {
    return view('welcome');
});

// 1. Pengatur Lalu Lintas Utama (SaaS Dashboard)
Route::get('/dashboard', function () {
    $role = auth()->user()->role;
    
    if ($role === 'rw') return redirect()->route('dashboard.rw');
    if ($role === 'rt') return redirect()->route('dashboard.rt');
    
    return view('dashboard'); // Default buat Warga
})->middleware(['auth', 'verified'])->name('dashboard');


// 2. Rute Khusus RT
Route::middleware(['auth', 'role:rt'])->group(function () {
    Route::get('/dashboard/rt', function () {
        return view('dashboard-rt'); // <-- Ini yang diubah
    })->name('dashboard.rt');
    Route::get('/dashboard/rt/warga', [WargaController::class, 'index'])->name('rt.warga.index');
    Route::get('/dashboard/rt/warga/{user}/edit', [WargaController::class, 'edit'])->name('rt.warga.edit');
    Route::put('/dashboard/rt/warga/{user}', [WargaController::class, 'update'])->name('rt.warga.update');
    Route::delete('/dashboard/rt/warga/{user}', [WargaController::class, 'destroy'])->name('rt.warga.destroy');
});


// 3. Rute Khusus RW
Route::middleware(['auth', 'role:rw'])->group(function () {
    Route::get('/dashboard/rw', function () {
        return view('dashboard-rw');
    })->name('dashboard.rw');
});


// 4. INI YANG SEMPET HILANG (Rute Profile Bawaan Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard/rt/warga/tambah', [WargaController::class, 'create'])->name('rt.warga.create');
    Route::post('/dashboard/rt/warga/simpan', [WargaController::class, 'store'])->name('rt.warga.store');
});

Route::middleware(['auth', 'role:rt'])->group(function () {
    // Route buat Warga yang kemaren
    Route::resource('dashboard/rt/warga', WargaController::class)->names('rt.warga');
    
    // NAH TAMBAHIN INI TOT 👇 Route buat Iuran Kas
    Route::resource('dashboard/rt/iuran', IuranKasController::class)->names('rt.iuran');
});

require __DIR__.'/auth.php';