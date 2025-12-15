<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slung,
            'category' => $this->whenLoaded('category', function () {
                return [
                    'id' => $this->category->id,
                    'title' => $this->category->title,
                    'slug' => $this->category->slung,
                ];
            }),
            'image' => $this->image ? url('/uploads/blogs/' . $this->image) : null,
            'blockquote' => $this->blockquote,
            'content' => $this->content,
            'content_extra' => $this->content_extra,
            'credit' => $this->credit,
            'created_at' => $this->created_at->toISOString(),
            'updated_at' => $this->updated_at->toISOString(),
        ];
    }
}

