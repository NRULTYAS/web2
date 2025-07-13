<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // database/migrations/xxxx_xx_xx_create_pendaftarans_table.php
public function up()
{
    Schema::create('pendaftarans', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->date('tanggal_lahir');
        $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
        $table->string('agama');
        $table->text('alamat');
        $table->string('nama_ortu');
        $table->string('no_hp');
        $table->string('akte');
        $table->string('kk');
        $table->boolean('diterima')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
