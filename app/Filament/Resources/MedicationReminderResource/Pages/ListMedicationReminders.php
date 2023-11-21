<?php

namespace App\Filament\Resources\MedicationReminderResource\Pages;

use App\Filament\Resources\MedicationReminderResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMedicationReminders extends ListRecords
{
    protected static string $resource = MedicationReminderResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
