<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category_id',
        'slung',
        'image',
        'blockquote',
        'content_extra',
        'content_one',
        'image_one',
        'content_two',
        'image_two',
        'content_three',
        'image_three',
        'content_four',
        'image_four',
        'content_five',
        'image_five',
        'content',
        'credit',
    ];

    /**
     * Get the category that owns the blog.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the image URL attribute.
     */
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return url('/uploads/blogs/' . $this->image);
        }
        return null;
    }
}
