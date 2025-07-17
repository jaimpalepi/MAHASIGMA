<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class artikel extends Model
{

    protected $table = 'artikel';

    protected $fillable = [
        'judul',
        'cover',
        'isi',
    ];
}
