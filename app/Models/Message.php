<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'name',
        'email',
        'subject',
        'title',
        'content',
        'status',
    ];

    protected $casts = [
        'status' => 'integer',
    ];

    /**
     * Scope to get unread messages.
     */
    public function scopeUnread($query)
    {
        return $query->where('status', 0);
    }

    /**
     * Scope to get read messages.
     */
    public function scopeRead($query)
    {
        return $query->where('status', 1);
    }

    /**
     * Check if message is unread.
     */
    public function isUnread()
    {
        return $this->status == 0;
    }
}
