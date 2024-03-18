<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    protected function casts(): array
    {
        return [
            'roles' => 'array',
        ];
    }

    public function getResourceTypeAttribute($value): string
    {
        $resourceTypes = [
            'BLOOD_WELL' => 'Blood',
            'MANA' => 'Mana',
            'ENERGY' => 'Energy',
            'NONE' => 'None',
            'HEALTH' => 'Health',
            'RAGE' => 'Rage',
            'COURAGE' => 'Courage',
            'SHIELD' => 'Shield',
            'FURY' => 'Fury',
            'FEROCITY' => 'Ferocity',
            'HEAT' => 'Heat',
            'GRIT' => 'Grit',
            'BLOODTHIRST' => 'Bloodthirst',
            'FLOW' => 'Flow',
            'SOUL_UNBOUND' => 'Soul Unbound',
        ];

        return $resourceTypes[$value];
    }

    public function getAdaptiveTypeAttribute($value): string
    {
        $adaptiveTypes = [
            'ADAPTIVE_DAMAGE' => 'Adaptive',
            'MAGIC_DAMAGE' => 'Magical',
            'PHYSICAL_DAMAGE' => 'Physical',
        ];

        return $adaptiveTypes[$value];
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function skins(): HasMany
    {
        return $this->hasMany(ChampionSkin::class, 'champion_id', 'champion_id');
    }

    public function lanes(): HasOne
    {
        return $this->hasOne(ChampionRoles::class, 'champion_id', 'champion_id');
    }

    public function getChampionImageAttribute($centered = true): string
    {
        $url = 'https://cdn.communitydragon.org/latest/champion/' . $this->champion_id . '/splash-art';

        return $centered ? $url . '/centered' : $url;
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
