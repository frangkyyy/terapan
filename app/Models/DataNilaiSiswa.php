<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataNilaiSiswa extends Model
{
    public $timestamps = false;
    protected $table = "siswa";
    protected $primarykey = "id";
    protected $fillable = [
        'id','nama', 'kelas', 'nilai'];
}