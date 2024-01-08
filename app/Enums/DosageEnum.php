<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self Half()
 * @method static self One()
 * @method static self Two()
 * @method static self Three()
 * @method static self Four()
 * @method static self Five()
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
            'Three' => 4,
            'Four' => 5,
            'Five' => 6,
            'More' => 7,
        ];
    }

    protected static function labels(): array
    {
        return [
            'Half' => __('Half intake / application'),
            'One' => __('One intakes / applications'),
            'Two' => __('Two intakes / applications'),
            'Three' => __('Three intakes / applications'),
            'Four' => __('Four intakes / applications'),
            'Five' => __('Five intakes / applications'),
            'More' => __('More than five intakes / applications'),
        ];
    }
}
