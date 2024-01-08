<?php

namespace App\Filament\Resources\TrackingResource\Widgets;

use App\Models\Symptom;
use App\Models\Tracking;
use Filament\Widgets\BarChartWidget;

class SymptomChart extends BarChartWidget
{
    // protected static ?string $maxHeight = '2000px';

    protected function getHeading(): string
    {
        return 'Symptom Chart';
    }

    protected function getData(): array
    {
        $symptoms = Symptom::all();

        $colorPalette = [
            '#FF5733', '#FFD133', '#A1FF33', '#33FF57', '#33B8FF',
            '#5733FF', '#A133FF', '#FF33A1', '#6B33FF', '#FF3333',
        ];

        $datasets = [];

        $colorIndex = 0;

        foreach ($symptoms as $symptom) {
            $count = Tracking::where('symptom_id', $symptom->id)->count();

            $datasets[] = [
                'label' => $symptom->name,
                'data' => [$count],
                'backgroundColor' => $colorPalette[$colorIndex % count($colorPalette)],
            ];

            $colorIndex++;
        }

        return [
            'datasets' => $datasets,
            'labels' => ['Symptoms'],
        ];
    }

    // protected function setOptions(): array
    // {
    //     // Set inline styles for the chart container
    //     return [
    //         'style' => [
    //             'height' => '300px', // Adjust the height as needed
    //             'width' => '100%',   // Adjust the width as needed
    //         ],
    //     ];
    // }
}

