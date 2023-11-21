<?php

namespace App\Filament\Resources\InsightResource\Pages;

use App\Filament\Resources\InsightResource;
use App\Models\Insight;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateInsight extends CreateRecord
{
    protected static string $resource = InsightResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getURL('index');
    }

    protected function handleRecordCreation(array $data): Insight
    {
        $insight = new Insight;
        $insight->fill($data);
        $insight->save();

        return $insight;
    }
}
