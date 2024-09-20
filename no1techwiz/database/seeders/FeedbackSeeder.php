<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Feedback;

class FeedbackSeeder extends Seeder
{
    public function run()
    {
        $feedbacks = [
            ['user_id' => 1, 'content' => 'Great experience visiting the Eiffel Tower!'],
            ['user_id' => 2, 'content' => 'Loved the beaches in Bali.'],
            ['user_id' => 3, 'content' => 'The Himalayan trail was challenging but rewarding.'],
            ['user_id' => 4, 'content' => 'Safari in Kenya was unforgettable!'],
            ['user_id' => 5, 'content' => 'The business conference in Singapore was very informative.'],
        ];

        foreach ($feedbacks as $feedback) {
            Feedback::create($feedback);
        }
    }
}
