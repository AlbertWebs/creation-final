<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    public $table = 'slider';

    protected $fillable = [
        'name',
        'content',
        'image',
        'order',
        'status',
    ];

    /**
     * Get the image attribute and sanitize filename (convert colons to underscores)
     */
    public function getImageAttribute($value)
    {
        return $value ? str_replace(':', '_', $value) : $value;
    }

    /**
     * Scope to get only active sliders
     */
    public function scopeActive($query)
    {
        return $query->where(function($q) {
            $q->where('status', 1)->orWhereNull('status');
        });
    }

    /**
     * Scope to order sliders
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc')->orderBy('id', 'asc');
    }
}

