<?php

namespace Database\Seeders;

use App\Models\Allergy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AllergySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Allergy::create(['name' => 'Gluten', 'description' => 'Bevat gluten uit tarwe, gerst, rogge of andere granen.']);
        Allergy::create(['name' => 'Melk', 'description' => 'Bevat melk of melkproducten zoals lactose.']);
        Allergy::create(['name' => 'Vis', 'description' => 'Bevat vis of visproducten.']);
        Allergy::create(['name' => 'Soja', 'description' => 'Bevat soja of sojaproducten.']);
        Allergy::create(['name' => 'Noten', 'description' => 'Bevat noten zoals amandelen, hazelnoten, walnoten of cashews.']);
        Allergy::create(['name' => 'Eieren', 'description' => 'Bevat eieren of producten gemaakt van ei.']);
    }
}
