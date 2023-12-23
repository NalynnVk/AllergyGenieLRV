<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MedicationReminderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            // 'patient_id'=>$this->patient_id,
            // 'medication_id'=>$this->medication_id,

            //name dari medication
            'medication'=> new MedicationResource($this->medication),
            'dosage' => $this->dosage,
            'time_reminder' => $this->time_reminder,
            'repititon' => $this->repititon,

            //kalau list MedicationResource::collection()

        ];
    }
}
