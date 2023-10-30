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
        $dependant = Dependant::find($data['id']);
        $data['user']['name'] = $dependant->user->name ?? null;
        $data['user']['date_of_birth'] = $dependant->user->date_of_birth ?? null;
        $data['user']['phone_number'] = $dependant->user->phone_number ?? null;
        $data['user']['profile_photo_path'] = $dependant->user->profile_photo_path ?? null;

        return $data;
    }

    // protected function mutateFormDataBeforeFill(array $data): array
    // {
    //     if ($data != null) {
    //         $dependant = Dependant::find($data['id']);

    //         //Patients
    //         $patient_array = [];
    //         foreach ($dependant->patients ?? [] as $patient) {
    //             $patient_array[] = $patient->id;
    //         }
    //         $data['patient'] = $patient_array ?? null;
    //     }
    //     return $data;
    // }

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
