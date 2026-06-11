<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // foreignId ini buat nyambungin si user ke komplek perumahan mana
            $table->foreignId('perumahan_id')->nullable()->constrained('perumahans')->onDelete('cascade');
            
            // enum ini buat batesin role biar cuma bisa diisi 4 pilihan ini aja
            $table->enum('role', ['admin_aplikasi', 'rw', 'rt', 'warga'])->default('warga');
            
            // no_rt & no_rw buat nandain dia ketua RT/RW berapa
            $table->string('no_rt')->nullable(); 
            $table->string('no_rw')->nullable(); 
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Ini buat ngehapus kolomnya kalau lu ngebatalin (rollback) migration
            $table->dropForeign(['perumahan_id']);
            $table->dropColumn(['perumahan_id', 'role', 'no_rt', 'no_rw']);
        });
    }
};
