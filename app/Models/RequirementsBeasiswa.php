<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequirementsBeasiswa extends Model
{
    protected $table = 'requirements_beasiswas';

    protected $fillable = ['beasiswa_id, requirement_id'];

    public function requirement()
    {
        return $this->belongsTo(Requirements::class);
    }
}
