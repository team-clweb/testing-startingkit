<?php

namespace Database\Seeders;

use App\Models\Stock;
use Illuminate\Database\Seeder;

class StockSeeder extends Seeder
{
    public function run(): void
    {
        Stock::create([
            'ingredient_id' => 1,
            'quantity' => 1000,
            'delivery_date' => '2025-09-10',
        ]);

        Stock::create([
            'ingredient_id' => 2,
            'quantity' => 1500,
            'delivery_date' => '2025-09-12',
        ]);
    }
}
