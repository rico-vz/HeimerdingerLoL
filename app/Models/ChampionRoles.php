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

    public function getRolesAttribute($value)
    {
        $mappedRoles = [];
        foreach ($value as $role) {
            switch ($role) {
                case 'TOP':
                    $mappedRoles[] = 'Toplane';
                    break;
                case 'JUNGLE':
                    $mappedRoles[] = 'Jungle';
                    break;
                case 'MIDDLE':
                    $mappedRoles[] = 'Midlane';
                    break;
                case 'BOTTOM':
                    $mappedRoles[] = 'Botlane';
                    break;
                case 'UTILITY':
                    $mappedRoles[] = 'Support';
                    break;
                default:
                    break;
            }
        }

        return $mappedRoles;
    }


    public function champion()
    {
        return $this->belongsTo(Champion::class);
    }
}
