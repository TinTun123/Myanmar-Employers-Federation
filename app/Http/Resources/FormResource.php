<?php

namespace App\Http\Resources;

use App\Models\Form_version;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FormResource extends JsonResource
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
            'slug' => $this->slug,
            'status' => $this->status,
            'description' => $this->description,
            'created_at' => $this->created_at->diffForHumans(),
            'updated_at' => $this->updated_at,
            'questions' => FormQuestionResource::collection(
                $this->latestFormVersion?->questions->where('is_prefixed', false) ?? []
            ),
            'id_prefix_question' => new FormQuestionResource(
                $this->latestFormVersion?->questions->where('is_prefixed', true)->first()
            ),
            'version' => $this->latestFormVersion->version ?? 1,
            'form_version_id' => $this->latestFormVersion->id,
            'responses_count' => $this->latestFormVersion?->responses()->count() ?? 0,
            'public_url' => 'http://localhost:5173/reports/' . $this->id
        ];
    }
}
