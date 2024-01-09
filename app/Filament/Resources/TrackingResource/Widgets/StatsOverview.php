<?php

namespace App\Filament\Resources\TrackingResource\Widgets;

use App\Enums\SymptomSeverityEnum;
use App\Models\Tracking;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Tracking Records', Tracking::count()),
            Card::make('Mild Severity', Tracking::where('severity', SymptomSeverityEnum::Mild()->value)->count()),
            Card::make('Moderate Severity', Tracking::where('severity', SymptomSeverityEnum::Moderate()->value)->count()),
            Card::make('Severe Severity', Tracking::where('severity', SymptomSeverityEnum::Severe()->value)->count()),
        ];
    }
}
