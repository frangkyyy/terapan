<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPeriodeIdToMataPelajaranSiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mata_pelajaran_siswa', function (Blueprint $table) {
            Schema::table('mata_pelajaran_siswa', function (Blueprint $table) {
                $table->string('periode_id'); // Adjust the column type if necessary
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mata_pelajaran_siswa', function (Blueprint $table) {
            $table->dropColumn('periode_id');
        });
    }
}
