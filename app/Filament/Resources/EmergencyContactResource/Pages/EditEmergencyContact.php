<?php

namespace App\Filament\Resources\EmergencyContactResource\Pages;

use App\Filament\Resources\EmergencyContactResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEmergencyContact extends EditRecord
{
    protected static string $resource = EmergencyContactResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getURL('index');
    }

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
