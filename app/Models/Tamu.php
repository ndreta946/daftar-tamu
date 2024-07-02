<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    use HasFactory;
    protected $fillable = [
        'nik', 'nama', 'tlp', 'alamat', 'keperluan', 'tanggal', 'time_in', 'time_out', 'petugas'
    ];
    public $timestamps = false;
}
