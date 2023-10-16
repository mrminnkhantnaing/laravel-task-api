<?php

namespace App\Http\Resources\Domain;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
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
            'status' => $this->status,
            'description' => $this->description,
            'created_at' => now()->parse($this->created_at)->format('Y-m-d H:i'),
            'updated_at' => now()->parse($this->updated_at)->format('Y-m-d H:i'),
            'user' => $this->user->name,
        ];
    }
}
