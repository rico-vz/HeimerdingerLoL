<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function skins()
    {
        return $this->hasMany(ChampionSkin::class);
    }

    public function getChampionImageAttribute()
    {
        return 'https://cdn.communitydragon.org/latest/champion/'.$this->champion_id.'/splash-art';
    }

    public function getChampionImageLoadingAttribute()
    {
        return 'https://cdn.communitydragon.org/latest/champion/'.$this->champion_id.'/portrait';
    }

    public function getChampionImageTileAttribute()
    {
        return 'https://cdn.communitydragon.org/latest/champion/'.$this->champion_id.'/tile';
    }

    public function getChampionSquareImageAttribute()
    {
        return 'https://cdn.communitydragon.org/latest/champion/'.$this->champion_id.'/square';
    }

    public function getChampionAbilityIconQAttribute()
    {
        return 'https://cdn.communitydragon.org/latest/champion/'.$this->champion_id.'/ability-icon/q';
    }

    public function getChampionAbilityIconWAttribute()
    {
        return 'https://cdn.communitydragon.org/latest/champion/'.$this->champion_id.'/ability-icon/w';
    }

    public function getChampionAbilityIconEAttribute()
    {
        return 'https://cdn.communitydragon.org/latest/champion/'.$this->champion_id.'/ability-icon/e';
    }

    public function getChampionAbilityIconRAttribute()
    {
        return 'https://cdn.communitydragon.org/latest/champion/'.$this->champion_id.'/ability-icon/r';
    }

    public function getChampionAbilityIconPAttribute()
    {
        return 'https://cdn.communitydragon.org/latest/champion/'.$this->champion_id.'/ability-icon/p';
    }
}
