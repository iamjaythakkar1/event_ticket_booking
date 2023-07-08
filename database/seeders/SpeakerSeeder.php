<?php

namespace Database\Seeders;

use App\Models\Speaker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpeakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Speaker::create([
            'speaker_name' => 'Yatrik Mehta',
            'speaker_description' => 'Speaker Description',
            'speaker_image' => 'default.jpg',
            'speakerable_type' => 'App\Models\Admin',
            'speakerable_id' => '1',
        ]);

        Speaker::create([
            'speaker_name' => 'Yatrik',
            'speaker_description' => 'Speaker Description',
            'speaker_image' => 'default.jpg',
            'speakerable_type' => 'App\Models\Admin',
            'speakerable_id' => '1',
        ]);

        Speaker::create([
            'speaker_name' => 'Jay Thakkar',
            'speaker_description' => 'Speaker Description',
            'speaker_image' => 'default.jpg',
            'speakerable_type' => 'App\Models\Organiser',
            'speakerable_id' => '1',
        ]);

        Speaker::create([
            'speaker_name' => 'Bhavik Prajapati',
            'speaker_description' => 'Speaker Description',
            'speaker_image' => 'default.jpg',
            'speakerable_type' => 'App\Models\Organiser',
            'speakerable_id' => '1',
        ]);

        Speaker::create([
            'speaker_name' => 'Chhatrasigh',
            'speaker_description' => 'Speaker Description',
            'speaker_image' => 'default.jpg',
            'speakerable_type' => 'App\Models\Organiser',
            'speakerable_id' => '1',
        ]);

        Speaker::create([
            'speaker_name' => 'Bhavik Patel',
            'speaker_description' => 'Speaker Description',
            'speaker_image' => 'default.jpg',
            'speakerable_type' => 'App\Models\Organiser',
            'speakerable_id' => '2',
        ]);

        Speaker::create([
            'speaker_name' => 'Jay',
            'speaker_description' => 'Speaker Description',
            'speaker_image' => 'default.jpg',
            'speakerable_type' => 'App\Models\Organiser',
            'speakerable_id' => '2',
        ]);
    }
}
