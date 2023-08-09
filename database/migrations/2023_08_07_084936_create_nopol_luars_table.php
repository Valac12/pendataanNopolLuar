<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nopol_luars', function (Blueprint $table) {
            $table->id();
            $table->string('no_polisi');
            $table->foreignId('kd_plat');
            $table->string('samsat_asal');
            $table->string('asal_kendaraan');
            $table->string('alamat_sesuai_stnk');
            $table->string('pemilik');
            $table->foreignId('id_user_pendataan');
            $table->string('nama_user');
            $table->date('tgl_pendataan');
            $table->string('latitude');
            $table->string('longitude');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nopol_luars');
    }
};
