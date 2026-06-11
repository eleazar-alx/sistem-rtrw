<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IuranKas extends Model
{
    use HasFactory;

    // Biarin semua kolom bisa diisi massal
    protected $guarded = [];

    // Relasi balik ke tabel users (biar kita tau ini duitnya siapa)
    public function warga()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}