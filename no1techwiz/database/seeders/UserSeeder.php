<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Người dùng hiện có (1, 2, 3, 4, 5)
        User::create([
            'name' => 'Nguyen Van A',
            'email' => 'a@example.com',
            'password' => Hash::make('password1'),
            'avatar' => null,
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Tran Thi B',
            'email' => 'b@example.com',
            'password' => Hash::make('password2'),
            'avatar' => null,
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Le Van C',
            'email' => 'c@example.com',
            'password' => Hash::make('password3'),
            'avatar' => null,
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Pham Thi D',
            'email' => 'd@example.com',
            'password' => Hash::make('password4'),
            'avatar' => null,
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Hoang Van E',
            'email' => 'e@example.com',
            'password' => Hash::make('password5'),
            'avatar' => null,
            'role' => 'admin',
        ]);

        // Thêm người dùng với id 19 và 20
        User::create([
            'name' => 'User Nineteen',
            'email' => 'user19@example.com',
            'password' => Hash::make('password19'),
            'avatar' => null,
            'role' => 'user',
        ]);

        User::create([
            'name' => 'User Twenty',
            'email' => 'user20@example.com',
            'password' => Hash::make('password20'),
            'avatar' => null,
            'role' => 'admin',
        ]);
    }
}
