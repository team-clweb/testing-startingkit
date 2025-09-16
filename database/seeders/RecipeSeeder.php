<?php

namespace Database\Seeders;

use App\Models\Recipe;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    public function run(): void
    {
        Recipe::create(['dish_id' => 1, 'instructions' => 'Kook de spaghetti en meng met de bolognesesaus.']);
        Recipe::create(['dish_id' => 2, 'instructions' => 'Bak de kip en groenten, voeg rijst en bouillon toe.']);
    }
}
