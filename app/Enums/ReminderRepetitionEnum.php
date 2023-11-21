<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;
/**
 * @method static self Once()
 * @method static self Daily()
 * @method static self Weekly()
 */

final class ReminderRepetitionEnum extends Enum
{
    //daily, weekly, monthly, once
    protected static function values(): array{
        return [
            'Once' => 1,
            'Daily' => 2,
            'Weekly' => 3,
        ];
    }
}
