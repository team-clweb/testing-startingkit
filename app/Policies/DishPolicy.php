<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Dish;
use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\Stock;

class DishPolicy
{
    /**
     * show controller method
     */
    public function view(User $user)
    {
        return $user->role === 'Admin';
    }

    /**
     *create/edit controller method
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
