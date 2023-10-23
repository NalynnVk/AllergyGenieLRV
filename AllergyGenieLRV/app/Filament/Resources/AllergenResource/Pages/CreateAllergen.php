<?php

namespace App\Filament\Resources\AllergenResource\Pages;

use App\Filament\Resources\AllergenResource;
use App\Models\Allergen;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAllergen extends CreateRecord
{
    protected static string $resource = AllergenResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getURL('index');
    }

    protected function handleRecordCreation(array $data): Allergen
    {
        $allergen = new Allergen;
        $allergen->fill($data);
        $allergen->save();

        return $allergen;
    }
}
