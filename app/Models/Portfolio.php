<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    public $table = 'portfolios';

    protected $fillable = [
        'title',
        'client',
        'meta',
        'slung',
        'image',
        'image_one',
        'image_two',
        'image_three',
        'image_four',
        'image_five',
        'image_six',
        'image_seven',
        'image_eight',
        'image_nine',
        'image_ten',
        'content',
    ];

    /**
     * Get the image attribute and sanitize filename (convert colons to underscores)
     * Note: This is a safety measure. Database should now have sanitized filenames.
     */
    public function getImageAttribute($value)
    {
        return $value ? str_replace(':', '_', $value) : $value;
    }

    /**
     * Get the image_one attribute and sanitize filename
     */
    public function getImageOneAttribute($value)
    {
        return $value ? str_replace(':', '_', $value) : $value;
    }

    /**
     * Get the image_two attribute and sanitize filename
     */
    public function getImageTwoAttribute($value)
    {
        return $value ? str_replace(':', '_', $value) : $value;
    }

    /**
     * Get the image_three attribute and sanitize filename
     */
    public function getImageThreeAttribute($value)
    {
        return $value ? str_replace(':', '_', $value) : $value;
    }

    /**
     * Get the image_four attribute and sanitize filename
     */
    public function getImageFourAttribute($value)
    {
        return $value ? str_replace(':', '_', $value) : $value;
    }

    /**
     * Get the image_five attribute and sanitize filename
     */
    public function getImageFiveAttribute($value)
    {
        return $value ? str_replace(':', '_', $value) : $value;
    }

    /**
     * Get the image_six attribute and sanitize filename
     */
    public function getImageSixAttribute($value)
    {
        return $value ? str_replace(':', '_', $value) : $value;
    }

    /**
     * Get the image_seven attribute and sanitize filename
     */
    public function getImageSevenAttribute($value)
    {
        return $value ? str_replace(':', '_', $value) : $value;
    }

    /**
     * Get the image_eight attribute and sanitize filename
     */
    public function getImageEightAttribute($value)
    {
        return $value ? str_replace(':', '_', $value) : $value;
    }

    /**
     * Get the image_nine attribute and sanitize filename
     */
    public function getImageNineAttribute($value)
    {
        return $value ? str_replace(':', '_', $value) : $value;
    }

    /**
     * Get the image_ten attribute and sanitize filename
     */
    public function getImageTenAttribute($value)
    {
        return $value ? str_replace(':', '_', $value) : $value;
    }
}
