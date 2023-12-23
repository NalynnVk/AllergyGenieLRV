<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TrackingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return
        [
            //symptom(name), allergen(name), symptom(severity_label), symptom(notes)
            'symptom'=> new SymptomResource($this->symptom),
            'allergen'=> new AllergenResource($this->allergen),
            'severity'=>$this->severity,
            'notes'=>$this->name,
        ];
    }
}
