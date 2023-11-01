<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkinChroma extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'full_skin_id',
        'skin_name',
        'chroma_name',
        'chroma_colors',
        'chroma_image',
    ];

    protected $casts = [
        'chroma_colors' => 'array',
    ];

    public function sluggable(): array
    {
        $slug = $this->chroma_name.' '.$this->skin_name;

        return [
            'slug' => [
                'source' => $slug,
            ],
        ];
    }

    public function skin()
    {
        return $this->belongsTo(Skin::class);
    }
}
