<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TrackingPolicy
{
    /**
     * Create a new policy instance.
     */
    use HandlesAuthorization;

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user): bool
    {
        return false;
    }
}
