<?php

namespace App\Filament\Resources\EmergencyContactResource\Pages;

use App\Filament\Resources\EmergencyContactResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEmergencyContacts extends ListRecords
{
    protected static string $resource = EmergencyContactResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
