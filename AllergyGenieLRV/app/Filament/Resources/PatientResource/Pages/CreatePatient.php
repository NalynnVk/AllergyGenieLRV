<?php

namespace App\Filament\Resources\PatientResource\Pages;

use App\Filament\Resources\PatientResource;
use App\Models\Patient;
use App\Models\User;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePatient extends CreateRecord
{
    protected static string $resource = PatientResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getURL('index');
    }

    protected function handleRecordCreation(array $data): Patient
    {
        // Create User
        $newUser = new User();
        $newUser->fill($data['user']);
        $newUser->password = 'password';
        $newUser->phone_number = 'phone_number';
        $newUser->save();

        $patient = new Patient();
        $patient->fill($data);
        $patient->user_id = $newUser->id;
        $patient->save();

        return $patient;
    }
}
