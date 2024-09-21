<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            TripSeeder::class,
            LocationTemplateSeeder::class,
            LocationSeeder::class,
            FeedbackSeeder::class,
            CurrencySeeder::class,
        ]);
    }
}
