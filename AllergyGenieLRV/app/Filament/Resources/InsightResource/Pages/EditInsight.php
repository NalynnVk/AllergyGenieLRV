<?php

namespace App\Filament\Resources\InsightResource\Pages;

use App\Filament\Resources\InsightResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInsight extends EditRecord
{
    protected static string $resource = InsightResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
