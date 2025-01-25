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
    protected $guarded = ['id_periode'];
    public $incrementing = false; // Tambahkan ini
    protected $keyType = 'string'; // Tambahkan ini juga untuk tipe data string

    public function users()
    {
        return $this->belongsToMany(User::class, 'mata_pelajaran_siswa', 'id_mata_pelajaran', 'user_id') ->withPivot('periode_id')->withTimestamps();
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class, 'id_periode', 'id_periode');
    }
}