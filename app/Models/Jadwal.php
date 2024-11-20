<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';

    protected $fillable = [
        'id_jadwal',
        'id_periode',
        'id',
        'id_mata_pelajaran',
        'id_kelas',
        'kelas',
        'jurusan',
    ];

    protected $primaryKey = 'id_jadwal';

}
