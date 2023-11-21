<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;
/**
 * @method static self Mild()
 * @method static self Severe()

 */

final class SymptomSeverityEnum extends Enum
{
    protected static function values(): array{
        return [
            'Mild' => 1,
            'Severe' => 2,
        ];
    }

    protected static function labels(): array
    {
        return [
            'Mild' => __('Mild to Moderate'),
        ];
    }
}
