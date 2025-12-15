<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'meta',
        'slung',
        'home',
        'icon',
        'image',
        'content',
        'content_extra',
    ];

    protected $casts = [
        'home' => 'boolean',
    ];
}
