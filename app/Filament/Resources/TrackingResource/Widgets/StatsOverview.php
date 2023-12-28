<?php

namespace App\Filament\Resources\TrackingResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('User', \App\Models\User::whereDate('created_at', today())->count()),
        ];
    }
}
