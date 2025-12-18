<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'role',
        'email',
        'password',
        'google_id',
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }

}
