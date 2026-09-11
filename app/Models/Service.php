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

    public function setContentAttribute($value): void
    {
        $this->attributes['content'] = self::normalizeNewlines($value);
    }

    public function setContentExtraAttribute($value): void
    {
        $this->attributes['content_extra'] = self::normalizeNewlines($value);
    }

    public function formattedContent(): string
    {
        return self::formatRichText($this->attributes['content'] ?? null);
    }

    public function formattedContentExtra(): string
    {
        return self::formatRichText($this->attributes['content_extra'] ?? null);
    }

    public static function normalizeNewlines(?string $value): ?string
    {
        if ($value === null) {
            return null;
        }

        return str_replace(['\\r\\n', '\\n', '\\r'], "\n", $value);
    }

    public static function formatRichText(?string $content): string
    {
        if ($content === null || trim($content) === '') {
            return '';
        }

        $text = html_entity_decode($content, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $text = self::normalizeNewlines($text);
        $text = str_replace(["\r\n", "\r"], "\n", $text);
        $text = preg_replace('/<br\s*\/?>/i', "\n", $text);
        $text = preg_replace("/[ \t]+\n/", "\n", $text);
        $text = trim($text);

        $paragraphs = preg_split("/\n+/", $text, -1, PREG_SPLIT_NO_EMPTY);
        $html = [];

        foreach ($paragraphs as $paragraph) {
            $paragraph = trim($paragraph);
            if ($paragraph === '') {
                continue;
            }

            $html[] = '<p style="margin-bottom: 15px;">' . $paragraph . '</p>';
        }

        return implode('', $html);
    }
}
