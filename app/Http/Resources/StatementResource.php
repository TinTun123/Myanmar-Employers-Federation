<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StatementResource extends JsonResource
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
            'date' => $this->date->format('d M Y'),
            'committee' => $this->committee,
            'statement_no' => $this->statement_no,
            'body' => $this->body,
            'images' => collect($this->images)->map(fn($path) => url($path)),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'imageFiles' => []
        ];
    }
}
