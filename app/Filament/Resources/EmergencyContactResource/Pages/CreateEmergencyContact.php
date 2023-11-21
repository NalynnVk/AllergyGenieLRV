<?php

namespace App\Filament\Resources\EmergencyContactResource\Pages;

use App\Filament\Resources\EmergencyContactResource;
use App\Models\EmergencyContact;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEmergencyContact extends CreateRecord
{
    protected static string $resource = EmergencyContactResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getURL('index');
    }

    protected function handleRecordCreation(array $data): EmergencyContact
    {
        $emergencyContact = new EmergencyContact;
        $emergencyContact->fill($data);
        $emergencyContact->save();

        return $emergencyContact;
    }
}
