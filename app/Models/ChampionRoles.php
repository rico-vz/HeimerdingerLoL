<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChampionRoles extends Model
{
    use HasFactory;

    protected $fillable = [
        'champion_id',
        'champion_name',
        'roles',
    ];

    protected $casts = [
        'roles' => 'array',
    ];

    public function champion()
    {
        return $this->belongsTo(Champion::class);
    }
}
