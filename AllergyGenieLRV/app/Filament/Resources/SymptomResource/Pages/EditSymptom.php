<?php

namespace App\Filament\Resources\SymptomResource\Pages;

use App\Filament\Resources\SymptomResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSymptom extends EditRecord
{
    protected static string $resource = SymptomResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
