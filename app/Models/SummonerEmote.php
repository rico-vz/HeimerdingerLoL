<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SummonerEmote extends Model
{
    protected $fillable = [
        'emote_id',
        'title',
        'image',
    ];
}
