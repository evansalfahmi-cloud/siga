<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('mata_pelajaran', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelajaran')->unique(); // Nama mata pelajaran harus unik
            $table->enum('kategori', ['Kejuruan', 'Umum']); // Gunakan huruf besar agar lebih rapi
            $table->foreignId('program_keahlian_id')->nullable()->constrained('program_keahlian')->onDelete('cascade'); // Hubungkan dengan program_keahlian
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mata_pelajaran');
    }
};