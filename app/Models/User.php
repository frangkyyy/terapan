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

}
