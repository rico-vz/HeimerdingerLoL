<?php

namespace App\Models;

use App\Enums\ContactCategory;
use Illuminate\Database\Eloquent\Model;

class ContactSubmission extends Model
{
    protected $fillable
        = [
            'name',
            'email',
            'discord',
            'category',
            'subject',
            'message',
        ];

    protected function casts(): array
    {
        return [
            'category' => ContactCategory::class,
        ];
    }
}
