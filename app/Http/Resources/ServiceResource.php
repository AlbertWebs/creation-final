<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
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
            'meta' => $this->meta,
            'content' => $this->content,
            'content_extra' => $this->content_extra,
            'image' => $this->image ? url('/uploads/services/' . $this->image) : null,
            'icon' => $this->icon,
            'home' => (bool) $this->home,
            'created_at' => $this->created_at->toISOString(),
            'updated_at' => $this->updated_at->toISOString(),
        ];
    }
}

