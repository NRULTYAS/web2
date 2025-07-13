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
        Schema::create('siswas', function (Blueprint $table) {
    $table->id();
    $table->string('nama');
    $table->date('tanggal_lahir');
    $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
    $table->string('agama');
    $table->text('alamat');
    $table->string('nama_orang_tua');
    $table->string('no_hp');
    $table->string('akte');
    $table->string('kk');
    $table->boolean('diterima')->nullable(); // true = diterima, false = ditolak, null = belum diumumkan
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
