<?php

namespace Database\Factories;

use App\Models\Rate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Rate>
 */
class RateFactory extends Factory
{
    protected $model = Rate::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'film_id' => rand(1, 20), // Adjust the range based on your Film seeding
            'user_id' => rand(1, 100), // Adjust the range as needed
            'rating' => $this->faker->numberBetween(1, 5),
        ];
    }
}

