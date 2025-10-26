<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class artikel extends Model
{

    protected $table = 'artikel';

    protected $fillable = [
        'judul',
        'cover',
        'isi',
        'kategori_id',
        'fakultas_id',
        'tanggal_mulai',   
        'tanggal_selesai',
        'is_featured',
    ];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(kategori::class);
    }

    public function fakultas(): BelongsTo
    {
        return $this->belongsTo(Fakultas::class);
    }
}
