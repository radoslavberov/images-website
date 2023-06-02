<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\User;
use Faker\Factory;
use Faker\Provider\Address;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        $admin = User::first();
        $imageDescription = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
        $defaultImageFilename = 'laravel.png';
        $defaultImagePath = 'public/images/' . $defaultImageFilename;
        for ($i = 0; $i < 15; $i++) {
            $image = new Image();
            $image->title = $faker->sentence;
            $image->description = $imageDescription;
            $image->user_id = $admin->id;
            $image->file_path = $defaultImagePath;
            $image->save();
        }
    }
}
