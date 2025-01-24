<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;

    protected $table = 'periode';

    protected $fillable = [
        'id_periode',
        'tahun_akademik',
        'semester',
    ];

    protected $primaryKey = 'id_periode';
    public $incrementing = false; // Tambahkan ini
    protected $keyType = 'string'; // Tambahkan ini juga untuk tipe data string
}
