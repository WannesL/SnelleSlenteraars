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
        'end_of_hike',
        'location',
        'meeting_info',
        'practical_info',
        'image',
        'map_image',
    ];

    protected $casts = [
        'date_of_hike' => 'datetime',
        'end_of_hike' => 'datetime',
        'distance' => 'decimal:1',
    ];

    public function imageUrl(): string
    {
        return $this->image
            ? asset('images/wandelingen/' . $this->image)
            : 'https://placehold.co/1200x500?text=' . urlencode($this->location);
    }

    public function practicalInfoList(): array
    {
        $regels = explode("\n", $this->practical_info ?? '');

        return array_values(array_filter(array_map('trim', $regels)));
    }
}
