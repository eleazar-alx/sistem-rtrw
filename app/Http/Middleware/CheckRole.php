<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Cek kalau role user ada di daftar yang diizinkan
        if (in_array(auth()->user()->role, $roles)) {
            return $next($request);
        }

        // Kalau rolenya gak sesuai, tendang!
        abort(403, 'Akses Ditolak! Halaman ini bukan buat role lu.');
    }
}