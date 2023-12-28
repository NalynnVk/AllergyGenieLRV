<?php

namespace App\Filament\Pages;

use App\Filament\Resources\TrackingResource\Widgets\StatsOverview;
use App\Filament\Resources\TrackingResource\Widgets\SymptomChart;
use App\Filament\Widgets\TrackingChart;
use Filament\Pages\Page;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.dashboard';

    protected function getHeaderWidgets(): array
    {
        return [
            SymptomChart::class,
            StatsOverview::class,
        ];
    }
}
