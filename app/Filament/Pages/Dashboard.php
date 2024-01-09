<?php

namespace App\Filament\Pages;

use App\Filament\Resources\TrackingResource\Widgets\StatsOverview;
use App\Filament\Resources\TrackingResource\Widgets\SymptomChart;
use App\Filament\Resources\UserResource\Widgets\StatsOverview2;
use App\Filament\Widgets\TrackingChart;
use Filament\Pages\Page;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-s-home';

    protected static string $view = 'filament.pages.dashboard';

    protected function getHeaderWidgets(): array
    {
        return [
            StatsOverview2::class,
            StatsOverview::class,
            SymptomChart::class,
        ];
    }

    // protected function setOptions(): array
    // {
    //     return [
    //         'style' => [
    //             'height' => '300px', // Adjust the height as needed
    //             'width' => '100%',   // Adjust the width as needed
    //         ],
    //     ];
    // }
}
