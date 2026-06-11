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
        return view('dashboard-rt'); 
    })->name('dashboard.rt');

    // Cukup 2 baris aja pake RESOURCE! Ini otomatis udah ngebungkus route index, create, store, edit, update, destroy.
    Route::resource('dashboard/rt/warga', WargaController::class)->names('rt.warga');
    Route::resource('dashboard/rt/iuran', IuranKasController::class)->names('rt.iuran');
});


// 3. Rute Khusus RW
Route::middleware(['auth', 'role:rw'])->group(function () {
    Route::get('/dashboard/rw', function () {
        return view('dashboard-rw');
    })->name('dashboard.rw');
});


// 4. Rute Profile Bawaan Breeze
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';