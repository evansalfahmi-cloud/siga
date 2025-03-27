<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('materi', function (Blueprint $table) {
            $table->id();
            $table->string('judul_materi');
            $table->string('mata_pelajaran');
            $table->text('deskripsi');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Menghubungkan ke tabel users
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('materi');
    }
};
