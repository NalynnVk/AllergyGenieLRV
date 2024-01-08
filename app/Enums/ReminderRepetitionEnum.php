<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;
/**
 * @method static self Once()
 * @method static self Twice()
 * @method static self Three()
 * @method static self Four()
 * @method static self Everyday()
 * @method static self Every()
 * @method static self As()
 * @method static self Before()
 * @method static self After()
 * @method static self Right()
 * @method static self At()
 */

final class ReminderRepetitionEnum extends Enum
{
    //daily, weekly, monthly, once
    protected static function values(): array{
        return [
            'Once' => 1,
            'Twice' => 2,
            'Three' => 3,
            'Four' => 4,
            'Everyday' => 5,
            'Every' => 6,
            'As' => 7,
            'Before' => 8,
            'After' => 9,
            'Right' => 10,
            'At' => 11,
        ];
    }
    protected static function labels(): array
    {
        return [
            'Once' => __('Once daily'),
            'Twice' => __('Twice daily'),
            'Three' => __('Three times daily'),
            'Four' => __('Four times daily'),
            'Everyday' => __('Everyday'),
            'Every' => __('Every other day'),
            'As' => __('As needed'),
            'Before' => __('Before meals'),
            'After' => __('After meals'),
            'Right' => __('Right after bath'),
            'At' => __('At bedtime'),
        ];
    }
}
