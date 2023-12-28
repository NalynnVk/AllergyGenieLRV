<?php

namespace App\Filament\Resources\TrackingResource\Widgets;

use App\Models\Symptom;
use App\Models\Tracking;
use Filament\Widgets\BarChartWidget;

class SymptomChart extends BarChartWidget
{
    protected function getHeading(): string
    {
        return 'Symptom Chart';
    }

    protected function getData(): array
    {
        $symptoms = Symptom::all();

        $datasets = [];

        foreach ($symptoms as $symptom) {
            $count = Tracking::where('symptom_id', $symptom->id)->count();

            $datasets[] = [
                'label' => $symptom->name,
                'data' => [$count],
            ];
        }

        return [
            'datasets' => $datasets,
            'labels' => ['Symptoms'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
