<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BeasiswaApply extends Model
{

    protected $table = 'beasiswa_applies';

    protected $fillable = [
        'applicant_name',
        'beasiswa_id',
        'essay',
        'documents',
        'status',
    ];

    protected $casts = [
        'documents' => 'array',
    ];

    // 📎 Relationships
    public function beasiswa()
    {
        return $this->belongsTo(Beasiswa::class);
    }

}
