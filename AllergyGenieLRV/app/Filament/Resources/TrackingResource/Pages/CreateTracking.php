<?php

namespace App\Filament\Resources\TrackingResource\Pages;

use App\Filament\Resources\TrackingResource;
use App\Models\Tracking;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTracking extends CreateRecord
{
    protected static string $resource = TrackingResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getURL('index');
    }

    protected function handleRecordCreation(array $data): Tracking
    {
        $tracking = new Tracking;
        $tracking->fill($data);
        $tracking->save();

        return $tracking;
    }
}
