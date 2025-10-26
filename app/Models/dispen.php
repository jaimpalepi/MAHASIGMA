<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dispen extends Model
{
    protected $table = 'dispens'; // pastikan nama tabel di DB adalah 'dispen'

    protected $fillable = [
        'nama_acara',
        'waktu',
        'tempat',
        'mahasiswa',
        'status',
        'email',
    ];
}
