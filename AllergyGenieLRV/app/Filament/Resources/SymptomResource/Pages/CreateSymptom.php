<?php

namespace App\Filament\Resources\SymptomResource\Pages;

use App\Filament\Resources\SymptomResource;
use App\Models\Symptom;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSymptom extends CreateRecord
{
    protected static string $resource = SymptomResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getURL('index');
    }

    protected function handleRecordCreation(array $data): Symptom
    {
        $symptom = new Symptom;
        $symptom->fill($data);
        $symptom->save();

        return $symptom;
    }
}
