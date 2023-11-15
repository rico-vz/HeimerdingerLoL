<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class SummonerIcon extends Model
{
    use Sluggable;

    protected $fillable = [
        'icon_id',
        'title',
        'description',
        'release_year',
        'legacy',
        'image',
        'esports_team',
        'esports_region',
        'esports_event',
    ];

    protected $casts = [
        'legacy' => 'boolean',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['title', 'icon_id'],
            ],
        ];
    }
}
