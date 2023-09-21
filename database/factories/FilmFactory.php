<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class FilmFactory extends Factory
{
    public function definition()
    {

        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'cover' => function () {
                // Generate URL for cover image
                $image = Image::canvas(300, 400, '#ccc'); // Create a dummy image
                $path = 'public/covers/' . uniqid() . '.jpg'; // Unique file name
                Storage::put($path, (string)$image->encode('jpg')); //Save the image
                return $path;
            },
            'country_id' => DB::table('countries')->inRandomOrder()->first()->id, // Get a random country ID
        ];

    }
}


