<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('materi', function (Blueprint $table) {
            $table->renameColumn('mata_pelajaran', 'mata_pelajaran_id');
        });
    }

    public function down()
    {
        Schema::table('materi', function (Blueprint $table) {
            $table->renameColumn('mata_pelajaran_id', 'mata_pelajaran');
        });
    }
};
