<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('no_kk', 20)->nullable()->after('email');
            $table->string('nik', 20)->nullable()->after('no_kk');
            $table->enum('status_keluarga', ['Kepala Keluarga', 'Istri', 'Anak', 'Lainnya'])->nullable()->after('nik');
            $table->enum('tipe_warga', ['Lokal', 'Pendatang'])->default('Lokal')->after('status_keluarga');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['no_kk', 'nik', 'status_keluarga', 'tipe_warga']);
        });
    }
};