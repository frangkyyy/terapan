<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();
            $table->string('id_periode'); // Foreign key ke periode
            $table->string('id_mata_pelajaran'); // Foreign key ke mata pelajaran
            $table->unsignedBigInteger('id_kelas'); // Foreign key ke kelas
            $table->string('jurusan');
            $table->timestamps();

            // Menambahkan foreign key constraint
            $table->foreign('id_periode')->references('id')->on('periode')->onDelete('cascade');
            $table->foreign('id_mata_pelajaran')->references('id')->on('mata_pelajaran')->onDelete('cascade');
            $table->foreign('id_kelas')->references('id')->on('kelas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal');
    }
}
