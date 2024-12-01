<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\Event
 *
 * @property-read int $id
 * @property-read string $title
 * @property-read string|null $description
 * @property-read \Illuminate\Support\Carbon $date
 * @property-read string $location
 * @property-read \Illuminate\Support\Carbon|null $created_at
 * @property-read \Illuminate\Support\Carbon|null $updated_at
 */
class EventResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'date' => $this->date->toIso8601String(),
            'location' => $this->location,
            'owner' => new UserResource($this->whenLoaded('owner')),
            'registrations_count' => $this->when(
                isset($this->resource->registrations_count),
                (int) $this->resource->registrations_count
            ),
            'created_at' => $this->created_at?->toIso8601String(),
            'updated_at' => $this->updated_at?->toIso8601String(),
        ];
    }
}
