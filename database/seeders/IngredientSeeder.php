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
    }
}
