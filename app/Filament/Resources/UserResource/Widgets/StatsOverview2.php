<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview2 extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total User Records', User::count()),
        ];
    }
}
