<?php

namespace Database\Seeders;

use App\Models\Stock;
use Illuminate\Database\Seeder;

class StockSeeder extends Seeder
{
    public function run(): void
    {
        Stock::create(['ingredient_id' => 1, 'quantity' => 1000, 'delivery_date' => '2025-09-10']);
        Stock::create(['ingredient_id' => 2, 'quantity' => 1500, 'delivery_date' => '2025-09-12']);
        Stock::create(['ingredient_id' => 3, 'quantity' => 1200, 'delivery_date' => '2025-09-11']);
        Stock::create(['ingredient_id' => 4, 'quantity' => 1800, 'delivery_date' => '2025-09-13']);
        Stock::create(['ingredient_id' => 5, 'quantity' => 1600, 'delivery_date' => '2025-09-14']);
        Stock::create(['ingredient_id' => 6, 'quantity' => 50,   'delivery_date' => '2025-09-15']);
    }
}
