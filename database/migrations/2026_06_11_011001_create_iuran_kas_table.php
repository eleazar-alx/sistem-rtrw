<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('iuran_kas', function (Blueprint $table) {
            $table->id();
            
            // Relasi ke warga yang bayar
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); 
            
            // Data iuran
            $table->string('bulan', 20); // Contoh: Januari, Februari
            $table->year('tahun'); // Contoh: 2026
            $table->integer('nominal'); // Contoh: 50000
            
            // Status pembayaran
            $table->enum('status', ['Lunas', 'Menunggu Konfirmasi', 'Belum Lunas'])->default('Menunggu Konfirmasi');
            $table->string('bukti_bayar')->nullable(); // Buat nyimpen foto struk/transfer
            $table->text('keterangan')->nullable(); // Catatan tambahan

            // Filter khusus biar nyambung ke RT/RW-nya
            $table->unsignedBigInteger('perumahan_id');
            $table->string('no_rt', 10);
            $table->string('no_rw', 10);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iuran_kas');
    }
};
