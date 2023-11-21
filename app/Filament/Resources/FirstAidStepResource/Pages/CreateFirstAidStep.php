<?php

namespace App\Filament\Resources\FirstAidStepResource\Pages;

use App\Filament\Resources\FirstAidStepResource;
use App\Models\FirstAidStep;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFirstAidStep extends CreateRecord
{
    protected static string $resource = FirstAidStepResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getURL('index');
    }

    protected function handleRecordCreation(array $data): FirstAidStep
    {
        $firstAidStep = new FirstAidStep;
        $firstAidStep->fill($data);
        $firstAidStep->save();

        return $firstAidStep;
    }
}
