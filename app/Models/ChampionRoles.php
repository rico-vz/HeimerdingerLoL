<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChampionRoles extends Model
{
    use HasFactory;

    protected $fillable = [
        'champion_id',
        'champion_name',
        'roles',
    ];

    protected function casts(): array
    {
        return [
            'roles' => 'array',
        ];
    }

    public function champion(): BelongsTo
    {
        return $this->belongsTo(Champion::class, 'champion_id', 'champion_id');
    }

    public function getRolesAttribute($value): array
    {
        $value = json_decode($value);

        $roleNames = [
            'TOP' => 'Toplane',
            'JUNGLE' => 'Jungle',
            'MIDDLE' => 'Midlane',
            'BOTTOM' => 'Botlane',
            'UTILITY' => 'Support',
        ];

        $transformedRoles = [];

        foreach ($value as $role) {
            if (isset($roleNames[$role])) {
                $transformedRoles[] = $roleNames[$role];
            }
        }

        return $transformedRoles;
    }
}
