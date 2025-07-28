<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    protected $table = 'Heroes';

    protected $fillable = [
        'heroImage',
        'bigText',
        'smallText',
    ];
}
