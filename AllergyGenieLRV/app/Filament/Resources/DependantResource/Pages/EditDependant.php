<?php

namespace App\Filament\Resources\DependantResource\Pages;

use App\Filament\Resources\DependantResource;
use App\Models\Dependant;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDependant extends EditRecord
{
    protected static string $resource = DependantResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }

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
