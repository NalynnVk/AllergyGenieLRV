<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MedicationReminderPolicy
{
    /**
     * Create a new policy instance.
     */
    use HandlesAuthorization;

    public function create(User $user): bool
    {
        return false;
    }
}
