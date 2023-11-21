<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self Approved()
 * @method static self Rejected()
 * @method static self WaitingApproval()
 */
final class RegistrationStatusEnum extends Enum
{
    protected static function values(): array{
        return [
            'Approved' => 1,
            'Rejected' => 2,
            'WaitingApproval' => 3,
        ];
    }

    protected static function labels(): array
    {
        return [
            'WaitingApproval' => __('Waiting For Approval'),
        ];
    }
}
