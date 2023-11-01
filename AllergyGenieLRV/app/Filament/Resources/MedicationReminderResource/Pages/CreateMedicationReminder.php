<?php

namespace App\Filament\Resources\MedicationReminderResource\Pages;

use App\Filament\Resources\MedicationReminderResource;
use App\Models\MedicationReminder;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Enums\MedicationReminderEnum;

class CreateMedicationReminder extends CreateRecord
{
    protected static string $resource = MedicationReminderResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getURL('index');
    }

    protected function handleRecordCreation(array $data): MedicationReminder
    {
        $medicationreminder = new MedicationReminder();
        $medicationreminder->fill($data);
        $medicationreminder->save();

        return $medicationreminder;
    }
}
