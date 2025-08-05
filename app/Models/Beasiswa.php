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
        'cover',
        'description',
        'official_website',
        'contact_person',
        'pdf',
        'provider',
        'jenjang',
        'amount',
        'quota',
        'qualifications',
        'benefits',
        'open',
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

    protected $casts = [
        'qualifications' => 'array',
        'benefits' => 'array',
    ];
    
}
