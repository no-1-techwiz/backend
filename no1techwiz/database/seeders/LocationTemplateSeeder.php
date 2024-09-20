<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LocationTemplate;

class LocationTemplateSeeder extends Seeder
{
    public function run()
    {
        $locationTemplates = [
            ['name' => 'Eiffel Tower', 'category_id' => 1, 'image' => 'https://example.com/images/eiffel_tower.jpg'],
            ['name' => 'Louvre Museum', 'category_id' => 1, 'image' => 'https://example.com/images/louvre_museum.jpg'],
            ['name' => 'Bali Beach', 'category_id' => 2, 'image' => 'https://example.com/images/bali_beach.jpg'],
            ['name' => 'Himalayan Trail', 'category_id' => 3, 'image' => 'https://example.com/images/himalayan_trail.jpg'],
            ['name' => 'Times Square', 'category_id' => 4, 'image' => 'https://example.com/images/times_square.jpg'],
        ];

        foreach ($locationTemplates as $template) {
            LocationTemplate::create($template);
        }
    }
}
