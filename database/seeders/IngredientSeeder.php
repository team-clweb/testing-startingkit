<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    public function run(): void
    {
        Ingredient::create(['name' => 'Spaghetti', 'unit' => 'gram']);
        Ingredient::create(['name' => 'Gehakt', 'unit' => 'gram']);
        Ingredient::create(['name' => 'Bolognesesaus', 'unit' => 'ml']);
        Ingredient::create(['name' => 'Rijst', 'unit' => 'gram']);
        Ingredient::create(['name' => 'Kip', 'unit' => 'gram']);
        Ingredient::create(['name' => 'Saffraan', 'unit' => 'gram']);
    }
}
