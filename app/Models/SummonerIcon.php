<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Sqids\Sqids;

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
                'source' => ['title', 'sqid'],
            ],
        ];
    }

    public function getSqidAttribute(): string
    {
        $sqids = new Sqids(minLength: 5);
        return $sqids->encode([$this->icon_id]);
    }
}
