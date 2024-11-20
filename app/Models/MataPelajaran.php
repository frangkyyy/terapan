<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    use HasFactory;

    protected $table = 'mata_pelajaran';

    protected $fillable = [
        'id_mata_pelajaran',
        'id_periode',
        'nama_mata_pelajaran',
        'pengajar',
        'jam',
        'kelas',
        'nilai',
    ];

    protected $primaryKey = 'id_mata_pelajaran';
    public $incrementing = false; // Tambahkan ini
    protected $keyType = 'string'; // Tambahkan ini juga untuk tipe data string
}
