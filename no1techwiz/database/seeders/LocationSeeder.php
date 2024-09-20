<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    public function run()
    {
        $locations = [
            ['location_template_id' => 1, 'trip_id' => 1],
            ['location_template_id' => 2, 'trip_id' => 1],
            ['location_template_id' => 3, 'trip_id' => 2],
            ['location_template_id' => 4, 'trip_id' => 2],
            ['location_template_id' => 5, 'trip_id' => 3],
            ['location_template_id' => 1, 'trip_id' => 3],
            ['location_template_id' => 2, 'trip_id' => 4],
            ['location_template_id' => 3, 'trip_id' => 4],
            ['location_template_id' => 4, 'trip_id' => 5],
            ['location_template_id' => 5, 'trip_id' => 5],
        ];

        foreach ($locations as $location) {
            Location::create($location);
        }
    }
}
