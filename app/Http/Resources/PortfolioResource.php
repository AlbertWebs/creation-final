<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PortfolioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $images = [];
        $imageFields = ['image', 'image_one', 'image_two', 'image_three', 'image_four', 
                        'image_five', 'image_six', 'image_seven', 'image_eight', 'image_nine', 'image_ten'];
        
        foreach ($imageFields as $field) {
            if ($this->$field) {
                $images[] = url('/uploads/portfolios/' . $this->$field);
            }
        }

        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slung,
            'client' => $this->client,
            'meta' => $this->meta,
            'content' => $this->content,
            'images' => $images,
            'main_image' => $this->image ? url('/uploads/portfolios/' . $this->image) : null,
            'created_at' => $this->created_at->toISOString(),
            'updated_at' => $this->updated_at->toISOString(),
        ];
    }
}

