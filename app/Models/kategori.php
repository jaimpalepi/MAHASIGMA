<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class kategori extends Model
{
    // Mendefinisikan bahwa satu kategori bisa memiliki 'banyak' artikel
    public function artikels(): HasMany
    {
        return $this->hasMany(artikel::class);
    }
}