<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // <-- Tambahin ini di atas

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Paksa pakai HTTPS kalau lagi di server production (Railway)
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}