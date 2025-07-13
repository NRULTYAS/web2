<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('pendaftarans', function (Blueprint $table) {
            $table->renameColumn('nama_ortu', 'nama_orang_tua');
        });
    }

    public function down(): void
    {
        Schema::table('pendaftarans', function (Blueprint $table) {
            $table->renameColumn('nama_orang_tua', 'nama_ortu');
        });
    }
};
