<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Dennis Oostrom',
            'email' => 'dennis@clweb.nl',
            'password' => Hash::make('password123'),
            'role' => 'Admin',
        ]);

        User::factory()->create([
            'name' => 'Piet Jansen',
            'email' => 'pietjansen@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'Klant',
        ]);

        $this->call([
            DishSeeder::class,
            RecipeSeeder::class,
            IngredientSeeder::class,
            StockSeeder::class,
            IngredientRecipeSeeder::class,
        ]);
    }
}
