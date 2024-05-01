<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChampionImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_id',
        'champion_id',
        'type',
        'url',
    ];

    public function champion()
    {
        return $this->belongsTo(Champion::class);
    }
}
