<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Ingredient;

class IngredientPolicy
{
    /**
     * index controller method
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

    /**
     * destroy controller method
     */
    public function delete(User $user)
    {
        return $user->role === 'Admin';
    }
}
