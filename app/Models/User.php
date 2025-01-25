<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, HasRoles, Notifiable;

    protected $fillable = [
        'nrp', 'name', 'email', 'password',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($role)
    {
        return $this->roles->contains('name', $role);
    }

    public function mataPelajaran()
    {
        return $this->belongsToMany(MataPelajaran::class, 'mata_pelajaran_siswa', 'user_id', 'id_mata_pelajaran')->withPivot('periode_id')->withTimestamps();;
    }
}
