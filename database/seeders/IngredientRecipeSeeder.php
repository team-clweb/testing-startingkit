<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientRecipeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('ingredient_recipe')->insert([
            ['recipe_id' => 1, 'ingredient_id' => 1, 'quantity' => 100],
            ['recipe_id' => 1, 'ingredient_id' => 2, 'quantity' => 200],
            ['recipe_id' => 1, 'ingredient_id' => 3, 'quantity' => 150],
            ['recipe_id' => 2, 'ingredient_id' => 4, 'quantity' => 200],
            ['recipe_id' => 2, 'ingredient_id' => 5, 'quantity' => 300],
            ['recipe_id' => 2, 'ingredient_id' => 6, 'quantity' => 1],
        ]);
    }
}
