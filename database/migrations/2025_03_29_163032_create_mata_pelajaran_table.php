<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('mata_pelajaran', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelajaran');
            $table->enum('kategori', ['kejuruan', 'umum']);
            $table->unsignedBigInteger('program_keahlian_id')->nullable();
            $table->timestamps();

            // Foreign key untuk mata pelajaran kejuruan
            $table->foreign('program_keahlian_id')->references('id')->on('program_keahlian')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mata_pelajaran');
    }
};
