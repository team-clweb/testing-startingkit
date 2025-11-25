<?php

namespace App\Providers;

use App\Models\Dish;
use App\Policies\DishPolicy;
use App\Models\OpeningHour;
use App\Policies\OpeningHoursPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Dish::class => DishPolicy::class,
        OpeningHour::class => OpeningHoursPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
