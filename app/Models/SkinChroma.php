<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkinChroma extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_skin_id',
        'skin_name',
        'chroma_name',
        'chroma_colors',
        'chroma_image',
    ];

    public function skin()
    {
        return $this->belongsTo(Skin::class);
    }
}
