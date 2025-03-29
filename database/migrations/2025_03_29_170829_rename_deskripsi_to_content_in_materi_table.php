<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('materi', function (Blueprint $table) {
            $table->renameColumn('deskripsi', 'content'); // Mengubah nama kolom deskripsi menjadi content
        });
    }

    public function down(): void
    {
        Schema::table('materi', function (Blueprint $table) {
            $table->renameColumn('content', 'deskripsi'); // Jika rollback, kembalikan ke deskripsi
        });
    }
};
