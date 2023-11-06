<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Champion extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'champion_id',
        'key',
        'name',
        'title',
        'lore',
        'roles',
        'price_be',
        'price_rp',
        'resource_type',
        'attack_type',
        'adaptive_type',
        'release_date',
        'release_patch',
    ];

    protected $casts = [
        'roles' => 'array',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }

    public function skins(): HasMany
    {
        return $this->hasMany(ChampionSkin::class);
    }

    public function getChampionImageAttribute(): string
    {
        return 'https://cdn.communitydragon.org/latest/champion/' . $this->champion_id . '/splash-art';
    }

    public function getChampionImageLoadingAttribute(): string
    {
        return 'https://cdn.communitydragon.org/latest/champion/' . $this->champion_id . '/portrait';
    }

    public function getChampionImageTileAttribute(): string
    {
        return 'https://cdn.communitydragon.org/latest/champion/' . $this->champion_id . '/tile';
    }

    public function getChampionSquareImageAttribute(): string
    {
        return 'https://cdn.communitydragon.org/latest/champion/' . $this->champion_id . '/square';
    }

    public function getChampionAbilityIconQAttribute(): string
    {
        return 'https://cdn.communitydragon.org/latest/champion/' . $this->champion_id . '/ability-icon/q';
    }

    public function getChampionAbilityIconWAttribute(): string
    {
        return 'https://cdn.communitydragon.org/latest/champion/' . $this->champion_id . '/ability-icon/w';
    }

    public function getChampionAbilityIconEAttribute(): string
    {
        return 'https://cdn.communitydragon.org/latest/champion/' . $this->champion_id . '/ability-icon/e';
    }

    public function getChampionAbilityIconRAttribute(): string
    {
        return 'https://cdn.communitydragon.org/latest/champion/' . $this->champion_id . '/ability-icon/r';
    }

    public function getChampionAbilityIconPAttribute(): string
    {
        return 'https://cdn.communitydragon.org/latest/champion/' . $this->champion_id . '/ability-icon/p';
    }
}
