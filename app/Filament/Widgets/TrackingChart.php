<?php

namespace App\Filament\Widgets;

use App\Models\Symptom;
use App\Models\Tracking;
use Filament\Widgets\LineChartWidget;

class TrackingChart extends LineChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        $symptoms = Symptom::all();
        $labels = [];

        $datasets = [];

        foreach ($symptoms as $symptom) {
            $counts = Tracking::where('symptom_id', $symptom->id)
                ->orderBy('created_at')
                ->get()
                ->pluck('created_at')
                ->count();

            $datasets[] = [
                'label' => $symptom->name,
                'data' => [$counts],
            ];
        }

        // Generate labels for x-axis (e.g., dates)
        $labels = Tracking::distinct('created_at')
            ->orderBy('created_at')
            ->pluck('created_at')
            ->map(function ($date) {
                return $date->format('Y-m-d'); // Adjust the date format as needed
            })
            ->toArray();

        return [
            'datasets' => $datasets,
            'labels' => $labels,
        ];
    }
}
