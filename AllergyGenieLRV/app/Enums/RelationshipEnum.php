<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;
/**
 * @method static self Spouse()
 * @method static self Father()
 * @method static self Mother()
 * @method static self Brother()
 * @method static self Sister()
 * @method static self Son()
 * @method static self Daughter()
 */

final class RelationshipEnum extends Enum
{
    protected static function values(): array{
        return [
            'Spouse' => 1,
            'Father' => 2,
            'Mother' => 3,
            'Brother' => 4,
            'Sister' => 5,
            'Son' => 6,
            'Daughter' => 7,
        ];
    }
}
