<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inschrijving extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'people',
    ];

    public function wandeling(): BelongsTo
    {
        return $this->belongsTo(Wandeling::class);
    }
}
