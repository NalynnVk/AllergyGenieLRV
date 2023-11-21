<?php

namespace App\Filament\Resources\FirstAidStepResource\Pages;

use App\Filament\Resources\FirstAidStepResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFirstAidSteps extends ListRecords
{
    protected static string $resource = FirstAidStepResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
