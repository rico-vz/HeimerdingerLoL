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

    public function getResourceTypeAttribute($value): string
    {
        $resourceTypes = [
            'BLOOD_WELL' => 'Blood',
            'BLOODTHIRST' => 'Bloodthirst',
            'COURAGE' => 'Courage',
            'CRIMSON_RUSH' => 'Crimson Rush',
            'ENERGY' => 'Energy',
            'FEROCITY' => 'Ferocity',
            'FLOW' => 'Flow',
            'FRENZY' => 'Frenzy',
            'FURY' => 'Fury',
            'GRIT' => 'Grit',
            'HEALTH' => 'Health',
            'HEAT' => 'Heat',
            'MANA' => 'Mana',
            'NONE' => 'None',
            'RAGE' => 'Rage',
            'SHIELD' => 'Shield',
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

    public function streamers()
    {
        return $this->hasMany(Streamer::class, 'champion_id', 'champion_id');
    }

    public function getChampionImageAttribute(bool $uncentered = false): string
    {
        return getChampionImage($this->champion_id.'000', $uncentered ? 'uncentered_splash' : 'splash');
    }

    public function getChampionImageTileAttribute(): string
    {
        return getChampionImage($this->champion_id.'000', 'tile');
    }

    public function getChampionSquareImageAttribute(): string
    {
        return 'https://raw.communitydragon.org/pbe/plugins/rcp-be-lol-game-data/global/default/v1/champion-icons/'.$this->champion_id.'.png';
    }

    // TODO: Implement Ability Icons in the DB and get them from there.
    public function getChampionAbilityIconQAttribute(): string
    {
        return 'https://cdn.communitydragon.org/latest/champion/'.$this->champion_id.'/ability-icon/q';
    }

    public function getChampionAbilityIconWAttribute(): string
    {
        return 'https://cdn.communitydragon.org/latest/champion/'.$this->champion_id.'/ability-icon/w';
    }

    public function getChampionAbilityIconEAttribute(): string
    {
        return 'https://cdn.communitydragon.org/latest/champion/'.$this->champion_id.'/ability-icon/e';
    }

    public function getChampionAbilityIconRAttribute(): string
    {
        return 'https://cdn.communitydragon.org/latest/champion/'.$this->champion_id.'/ability-icon/r';
    }

    public function getChampionAbilityIconPAttribute(): string
    {
        return 'https://cdn.communitydragon.org/latest/champion/'.$this->champion_id.'/ability-icon/p';
    }

    protected function casts(): array
    {
        return [
            'roles' => 'array',
        ];
    }
}
