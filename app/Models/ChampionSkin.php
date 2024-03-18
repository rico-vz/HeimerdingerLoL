<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ChampionSkin extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'champion_id',
        'full_skin_id',
        'skin_id',
        'skin_name',
        'lore',
        'availability',
        'loot_eligible',
        'rp_price',
        'raritiy',
        'release_date',
        'associated_skinline',
        'new_effects',
        'new_animations',
        'new_recall',
        'new_voice',
        'new_quotes',
        'voice_actor',
        'splash_artist',
    ];

    protected function casts(): array
    {
        return [
            'associated_skinline' => 'array',
            'voice_actor' => 'array',
            'splash_artist' => 'array',
        ];
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'skin_name',
            ],
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function getRarityAttribute($value)
    {
        return $value === null || $value === 'NoRarity' ? 'Common' : $value;
    }

    public function champion(): BelongsTo
    {
        return $this->belongsTo(Champion::class, 'champion_id', 'champion_id');
    }

    public function chromas(): HasMany
    {
        return $this->hasMany(SkinChroma::class, 'full_skin_id', 'full_skin_id');
    }

    public function getSkinImageAttribute(): string
    {
        return 'https://raw.communitydragon.org/pbe/plugins/rcp-be-lol-game-data/global/default/v1/champion-splashes/'.$this->champion_id.'/'.$this->full_skin_id.'.jpg';
    }

    public function getSkinImageLoadingAttribute(): string
    {
        return 'https://cdn.communitydragon.org/latest/champion/'.$this->champion_id.'/portrait/skin/'.$this->skin_id;
    }

    public function getSkinImageTileAttribute(): string
    {
        return 'https://cdn.communitydragon.org/latest/champion/'.$this->champion_id.'/tile/skin/'.$this->skin_id;
    }
}
