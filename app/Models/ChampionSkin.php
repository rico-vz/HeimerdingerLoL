<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChampionSkin extends Model
{
    use HasFactory;

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

    protected $casts = [
        'associated_skinline' => 'array',
        'voice_actor' => 'array',
        'splash_artist' => 'array',
    ];

    public function champion()
    {
        return $this->belongsTo(Champion::class);
    }

    public function chromas()
    {
        return $this->hasMany(SkinChroma::class, 'full_skin_id', 'full_skin_id');
    }

    public function getSkinImageAttribute()
    {
        return 'https://cdn.communitydragon.org/latest/champion/' . $this->champion_id . '/splash-art/centered/skin/' . $this->skin_id;
    }

    public function getSkinImageLoadingAttribute()
    {
        return 'https://cdn.communitydragon.org/latest/champion/' . $this->champion_id . '/portrait/skin/' . $this->skin_id;
    }

    public function getSkinImageTileAttribute()
    {
        return 'https://cdn.communitydragon.org/latest/champion/' . $this->champion_id . '/tile/skin/' . $this->skin_id;
    }
}
