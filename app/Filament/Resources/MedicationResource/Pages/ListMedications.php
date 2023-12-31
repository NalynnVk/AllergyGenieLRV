<?php

namespace App\Filament\Resources\MedicationResource\Pages;

use App\Filament\Resources\MedicationResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMedications extends ListRecords
{
    protected static string $resource = MedicationResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
