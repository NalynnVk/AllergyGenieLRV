<?php

namespace App\Filament\Resources\MedicationReminderResource\Pages;

use App\Filament\Resources\MedicationReminderResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMedicationReminder extends EditRecord
{
    protected static string $resource = MedicationReminderResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
