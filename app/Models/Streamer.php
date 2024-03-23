<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Champion;

class Streamer extends Model
{
    use HasFactory;

    protected $fillable = ['champion_id', 'platform', 'username', 'displayname'];


    public function getPlatformAttribute($value): string
    {
        $platforms = [
            'twitch' => 'Twitch',
            'youtube' => 'YouTube',
            'kick' => 'Kick',
            'douyu' => 'Douyu',
            'huya' => 'Huya',
        ];

        return $platforms[$value];
    }

    public function getStreamerUrlAttribute(): string
    {
        return match ($this->platform) {
            'Twitch' => "https://www.twitch.tv/{$this->username}",
            'YouTube' => "https://www.youtube.com/@{$this->username}",
            'Kick' => "https://kick.com/{$this->username}",
            'Douyu' => "https://www.douyu.com/{$this->username}",
            'Huya' => "https://www.huya.com/{$this->username}",
        };
    }

    public function champion(): BelongsTo
    {
        return $this->belongsTo(Champion::class, 'champion_id', 'champion_id');
    }
}
