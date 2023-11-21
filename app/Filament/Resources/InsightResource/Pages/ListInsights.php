<?php

namespace App\Filament\Resources\InsightResource\Pages;

use App\Filament\Resources\InsightResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInsights extends ListRecords
{
    protected static string $resource = InsightResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
