<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self Half()
 * @method static self One()
 * @method static self Two()
 * @method static self More()
 */

final class DosageEnum extends Enum
{
    //half, oneAndHalf, two
    protected static function values(): array{
        return [
            'Half' => 1,
            'One' => 2,
            'Two' => 3,
            'More' => 4,
        ];
    }

    protected static function labels(): array
    {
        return [
            'Half' => __('Half Tablet'),
            'One' => __('One Tablet'),
            'Two' => __('Two Tablet'),
            'More' => __('More Than Two Tablets'),
        ];
    }
}
