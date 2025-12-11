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
        Dish::create(['name' => 'Spaghetti Bolognese', 'price'=> '10.50', 'description' => 'Klassiek Italiaans pasta gerecht.', 'image' => 'dishes/3RdKZZAghdA37lTJmM7Sxt1EvsEJcr24dumm1575.jpg']);
        Dish::create(['name' => 'Paella', 'price'=> '14.00', 'description' => 'Klassiek Spaans rijst gerecht met kip.', 'image' => 'dishes/JoZqeO89iFRyrpgPJh5pcu8CLAwk3R6R4DMeLoFZ.jpg']);
    }
}
