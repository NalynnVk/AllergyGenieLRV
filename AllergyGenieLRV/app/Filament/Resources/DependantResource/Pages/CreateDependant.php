<?php

namespace App\Filament\Resources\DependantResource\Pages;

use App\Filament\Resources\DependantResource;
use App\Models\Dependant;
use App\Models\User;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateDependant extends CreateRecord
{
    protected static string $resource = DependantResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getURL('index');
    }

    protected function handleRecordCreation(array $data): Dependant
    {
        // Create User
        $newUser = new User();
        $newUser->fill($data['user']);
        $newUser->password = 'password';
        $newUser->save();

        $dependant = new Dependant;
        $dependant->fill($data);
        $dependant->user_id = $newUser->id;
        $dependant->save();

        return $dependant;
    }
}
