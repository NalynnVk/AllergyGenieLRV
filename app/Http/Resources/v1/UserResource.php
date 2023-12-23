<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'date_of_birth'  => $this->date_of_birth,
            'phone_number'  => $this->phone_number,
            'profile_photo_path'  => $this->profile_photo_path,
            'registration_status'  => $this->registration_status,
            "access_token" => $this->when($this->id == auth()->id(), function () {
                return $this->accessToken;
            }),
        ];
    }
}
