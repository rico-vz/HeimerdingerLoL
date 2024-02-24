<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\ContactCategory;

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

    protected $casts = [
        'category' => ContactCategory::class,
    ];
}