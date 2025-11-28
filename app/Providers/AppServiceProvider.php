<?php

namespace App\Providers;

use App\Models\Allergy;
use App\Models\Dish;
use App\Policies\DishPolicy;
use App\Models\OpeningHour;
use App\Policies\OpeningHoursPolicy;
use App\Policies\AllergyPolicy;
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
        Allergy::class => AllergyPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
