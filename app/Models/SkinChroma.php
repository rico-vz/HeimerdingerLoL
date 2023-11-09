<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SkinChroma extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'full_skin_id',
        'skin_name',
        'chroma_name',
        'chroma_colors',
        'chroma_image',
    ];

    protected $casts = [
        'chroma_colors' => 'array',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['chroma_name', 'skin_name'],
            ],
        ];
    }

    public function skin(): BelongsTo
    {
        return $this->belongsTo(ChampionSkin::class, 'full_skin_id', 'full_skin_id');
    }

    public function getChromaImageAttribute()
    {
        return 'https://raw.communitydragon.org/pbe/plugins/rcp-be-lol-game-data/global/default/v1/champion-chroma-images/' . $this->skin->champion_id . '/' . $this->chroma_id . '.png';
    }
}
