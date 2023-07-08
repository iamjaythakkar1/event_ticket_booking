<?php

namespace Database\Seeders;

use App\Models\Organiser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class OrganiserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Organiser::create([
            'organiser_name' => 'Bhavik Prajapati',
            'organiser_email' => 'organiser@gmail.com',
            'organiser_description' => 'Test Organiser',
            'phoneno' => '9876543210',
            'password' => Hash::make('12345678'),
            'status' => 1,
        ]);

        Organiser::create([
            'organiser_name' => 'Bhavik Prajapati',
            'organiser_email' => 'organiser2@gmail.com',
            'organiser_description' => 'Test Organiser',
            'phoneno' => '9876543210',
            'password' => Hash::make('12345678'),
            'status' => 1,
        ]);

        Organiser::create([
            'organiser_name' => 'Bhavik Prajapati',
            'organiser_email' => 'organiser3@gmail.com',
            'organiser_description' => 'Test Organiser',
            'phoneno' => '9876543210',
            'password' => Hash::make('12345678'),
            'status' => 1,
        ]);
    }
}
