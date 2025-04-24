<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return  [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'publish_date' => $this->publish_date->format('Y-m-d'),
            'likes' => $this->likes,
            'image' => url($this->image),
            'slug' => $this->slug,
        ];
    }
}
