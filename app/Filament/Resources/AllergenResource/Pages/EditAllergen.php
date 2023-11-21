<?php

namespace App\Filament\Resources\AllergenResource\Pages;

use App\Filament\Resources\AllergenResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAllergen extends EditRecord
{
    protected static string $resource = AllergenResource::class;

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
