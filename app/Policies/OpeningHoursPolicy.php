<?php

namespace App\Policies;

use App\Models\User;
use App\Models\OpeningHour;

class OpeningHoursPolicy
{
    /**
     * Create a new policy instance.
     */
    public function viewAny(User $user)
    {
        return $user->role === 'Admin';
    }

    /**
     * create/edit controller method
     */
    public function create(User $user)
    {
        return $user->role === 'Admin';
    }

    /**
     * update/store controller method
     */
    public function update(User $user)
    {
        return $user->role === 'Admin';
    }
}
