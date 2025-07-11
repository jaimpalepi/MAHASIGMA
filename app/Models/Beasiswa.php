<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beasiswa extends Model
{
    use HasFactory;

    protected $table = 'beasiswas';

    protected $fillable = [
        'title',
        'description',
        'provider',
        'amount',
        'quota',
        'deadline',
        'status',
    ];

    // Relationship
    public function applications()
    {
        return $this->hasMany(BeasiswaApply::class);
    }

    public function requirements()
    {
        return $this->belongsToMany(Requirements::class, 'requirements_beasiswas', 'beasiswa_id', 'requirement_id');
    }

}
