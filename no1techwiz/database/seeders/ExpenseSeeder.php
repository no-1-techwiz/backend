<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Expense;

class ExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        Expense::create([
            'location_id' => 1,
            'cost' => 200.50,
        ]);

        Expense::create([
            'location_id' => 2,
            'cost' => 350.00,
        ]);

        // Thêm nhiều bản ghi hơn nếu cần
    }
}
