<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMataPelajaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mata_pelajaran', function (Blueprint $table) {
            $table->string('id')->primary(); 
            $table->string('id_periode'); 
            $table->string('nama_mata_pelajaran');
            $table->string('pengajar');
            $table->string('jam'); 
            $table->string('kelas'); 
            $table->string('nilai'); 
            $table->timestamps();

            $table->foreign('id_periode')->references('id')->on('periode')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mata_pelajaran');
    }
}
