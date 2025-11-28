<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AllergyIngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('allergy_ingredient')->insert([
            ['ingredient_id' => 1, 'allergy_id' => 1],
            ['ingredient_id' => 1, 'allergy_id' => 2],
            ['ingredient_id' => 1, 'allergy_id' => 3],
            ['ingredient_id' => 2, 'allergy_id' => 4],
            ['ingredient_id' => 2, 'allergy_id' => 5],
            ['ingredient_id' => 2, 'allergy_id' => 6],
        ]);
    }
}
