<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FormQuestionResource extends JsonResource
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
            'question_text' => $this->question_text,
            'type' => $this->type,
            'description' => $this->description,
            'is_required' => $this->is_required,
            'is_prefixed' => $this->is_prefixed,
            'data' => $this->data,
        ];
    }
}
