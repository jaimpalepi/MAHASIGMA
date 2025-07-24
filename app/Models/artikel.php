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
    ];

    // Mendefinisikan bahwa sebuah artikel 'milik' satu kategori
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(kategori::class);
    }
}
