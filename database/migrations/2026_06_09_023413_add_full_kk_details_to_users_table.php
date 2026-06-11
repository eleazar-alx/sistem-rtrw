<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('tempat_lahir')->nullable()->after('name');
            $table->date('tanggal_lahir')->nullable()->after('tempat_lahir');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable()->after('tanggal_lahir');
            $table->enum('golongan_darah', ['A', 'B', 'AB', 'O', '-'])->default('-')->after('jenis_kelamin');
            $table->string('agama')->nullable()->after('golongan_darah');
            $table->string('pendidikan')->nullable()->after('agama');
            $table->string('pekerjaan')->nullable()->after('pendidikan');
            $table->enum('status_perkawinan', ['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati'])->nullable()->after('pekerjaan');
            $table->string('nama_ayah')->nullable()->after('tipe_warga');
            $table->string('nama_ibu')->nullable()->after('nama_ayah');
        });
    }

public function down(): void
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn([
            'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'golongan_darah',
            'agama', 'pendidikan', 'pekerjaan', 'status_perkawinan',
            'nama_ayah', 'nama_ibu'
        ]);
    });
}
};
