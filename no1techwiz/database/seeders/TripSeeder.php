<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Trip;

class TripSeeder extends Seeder
{
    public function run()
    {
        Trip::create([
            'user_id' => 1,
            'trip_name' => 'Trip to Paris',
            'start_date' => '2024-10-01',
            'end_date' => '2024-10-10',
            'destination' => 'Paris, France',
            'budget' => 1500.00,
            'note' => 'Visit the Eiffel Tower and Louvre Museum.',
        ]);

        Trip::create([
            'user_id' => 2,
            'trip_name' => 'Beach Vacation',
            'start_date' => '2024-11-05',
            'end_date' => '2024-11-12',
            'destination' => 'Bali, Indonesia',
            'budget' => 2000.00,
            'note' => 'Relax on the beaches and enjoy water sports.',
        ]);

        Trip::create([
            'user_id' => 3,
            'trip_name' => 'Mountain Hiking',
            'start_date' => '2024-12-15',
            'end_date' => '2024-12-20',
            'destination' => 'Himalayas, Nepal',
            'budget' => 1200.00,
            'note' => 'Hiking and trekking in the mountains.',
        ]);

        Trip::create([
            'user_id' => 4,
            'trip_name' => 'Safari Adventure',
            'start_date' => '2024-10-20',
            'end_date' => '2024-10-30',
            'destination' => 'Kenya',
            'budget' => 3000.00,
            'note' => 'Explore the wildlife in Kenya.',
        ]);

        Trip::create([
            'user_id' => 5,
            'trip_name' => 'Business Conference',
            'start_date' => '2024-09-15',
            'end_date' => '2024-09-20',
            'destination' => 'Singapore',
            'budget' => 2500.00,
            'note' => 'Attend international business conference.',
        ]);
    }
}
