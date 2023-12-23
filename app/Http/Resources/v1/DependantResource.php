<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DependantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user'=> new UserResource($this->user),
            // 'medication'=> new MedicationResource($this->medication),
            'relationship'=> $this-> relationship,
        ];
    }
}
