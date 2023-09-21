<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Genre;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Genre>
 */
class GenreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // Define your own genre names
        $genreNames = [
            'action',
            'comedy',
            'drama',
            'horror',
            'cartoons',
        ];
        return [
            'name' => $this->faker->randomElement($genreNames),
        ];
    }
}

