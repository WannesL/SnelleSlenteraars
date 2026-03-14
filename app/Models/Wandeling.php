<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wandeling extends Model
{
    protected $fillable = [
        'title',
        'description',
        'distance',
        'date_of_hike',
        'location',
    ];

    protected $casts = [
        'date' => 'datetime',
    ];
}
