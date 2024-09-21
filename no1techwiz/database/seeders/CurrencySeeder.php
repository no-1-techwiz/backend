<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Currency;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Currency::create([
            'code' => 'USD',
            'name' => 'US Dollar',
        ]);

        Currency::create([
            'code' => 'EUR',
            'name' => 'Euro',
        ]);

        Currency::create([
            'code' => 'GBP',
            'name' => 'British Pound',
        ]);

        // Thêm các loại tiền tệ khác nếu cần
    }
}
