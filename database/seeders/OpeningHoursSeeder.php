<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OpeningHour;

class OpeningHoursSeeder extends Seeder
{
    public function run(): void
    {
        OpeningHour::create([
            'day' => 'Maandag',
            'open' => null,
            'close' => null,
            'closed' => true
        ]);

        OpeningHour::create([
            'day' => 'Dinsdag',
            'open' => '17:30',
            'close' => '21:00',
            'closed' => false
        ]);

        OpeningHour::create([
            'day' => 'Woensdag',
            'open' => '17:30',
            'close' => '21:00',
            'closed' => false
        ]);

        OpeningHour::create([
            'day' => 'Donderdag',
            'open' => '17:30',
            'close' => '21:00',
            'closed' => false
        ]);

        OpeningHour::create([
            'day' => 'Vrijdag',
            'open' => '17:30',
            'close' => '21:00',
            'closed' => false
        ]);

        OpeningHour::create([
            'day' => 'Zaterdag',
            'open' => '17:30',
            'close' => '21:00',
            'closed' => false
        ]);

        OpeningHour::create([
            'day' => 'Zondag',
            'open' => '17:30',
            'close' => '21:00',
            'closed' => false
        ]);
    }
}
