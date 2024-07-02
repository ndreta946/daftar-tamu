<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// In Petugas.php
class Petugas extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nama', 'username', 'password', 'jabatan', 'role',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}

