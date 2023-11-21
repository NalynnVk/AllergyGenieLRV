<?php

namespace App\Filament\Resources\TrackingResource\Pages;

use App\Filament\Resources\TrackingResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTracking extends EditRecord
{
    protected static string $resource = TrackingResource::class;

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
