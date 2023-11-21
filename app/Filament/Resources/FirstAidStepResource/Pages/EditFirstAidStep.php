<?php

namespace App\Filament\Resources\FirstAidStepResource\Pages;

use App\Filament\Resources\FirstAidStepResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFirstAidStep extends EditRecord
{
    protected static string $resource = FirstAidStepResource::class;

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
