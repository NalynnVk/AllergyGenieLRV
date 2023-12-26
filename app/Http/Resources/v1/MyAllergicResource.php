<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class MyAllergicResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $this->load('allergenPatients');

        $filteredData = $this->allergenPatients
            ->where('patient_id', Auth::user()->patient->id)
            ->first();

        return [
            'allergen' =>  new AllergenResource($filteredData->allergen),
            'severity_id' => $filteredData->severity,
            'severity' => $filteredData->severity_label,
        ];
    }
}
