<?php

namespace App\Filament\Resources\PatientResource\Pages;

use App\Filament\Resources\PatientResource;
use App\Models\Patient;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPatient extends EditRecord
{
    protected static string $resource = PatientResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getURL('index');
    }

    // protected function beforeFill(): void
    // {
    //     // Retrieve the existing dependant's data based on the ID
    //     $patient = Patient::find($this->recordId);

    //     // Pre-fill the form fields with the existing data
    //     $this->record = $patient;
    // }

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
