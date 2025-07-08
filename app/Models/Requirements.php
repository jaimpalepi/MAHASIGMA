<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirements extends Model
{
    use HasFactory;

    protected $table = 'requirements';

    protected $fillable = ['name'];

    public function beasiswas()
    {
        return $this->belongsToMany(Beasiswa::class, 'requirements_beasiswa');
    }
}
