<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'user_name' => 'Yatrik Mehta',
            'user_email' => 'user@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        User::create([
            'user_name' => 'Yatrik Mehta',
            'user_email' => 'user2@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        User::create([
            'user_name' => 'Yatrik Mehta',
            'user_email' => 'user3@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
