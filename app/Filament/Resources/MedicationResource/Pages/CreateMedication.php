<?php

namespace App\Filament\Resources\MedicationResource\Pages;

use App\Filament\Resources\MedicationResource;
use App\Models\Medication;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMedication extends CreateRecord
{
    protected static string $resource = MedicationResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getURL('index');
    }

    protected function handleRecordCreation(array $data): Medication
    {
        $medication = new Medication();
        $medication->fill($data);
        $medication->save();

        return $medication;
    }
}
