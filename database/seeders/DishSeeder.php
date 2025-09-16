<?php

namespace Database\Seeders;
use App\Models\Dish;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dish::create(['name' => 'Spaghetti Bolognese', 'description' => 'Klassiek Italiaans pasta gerecht.']);
        Dish::create(['name' => 'Paella', 'description' => 'Klassiek Spaans rijst gerecht met kip.']);
    }
}
