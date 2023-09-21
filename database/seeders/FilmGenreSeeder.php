<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class FilmGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentTimestamp = Carbon::now();
        // Define an array of film_genre relationships (film_id, genre_id)
        $filmGenreRelationships = [
            ['film_id' => 1, 'genre_id' => 1, 'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp],
            ['film_id' => 1, 'genre_id' => 2, 'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp],
            ['film_id' => 2, 'genre_id' => 3, 'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp],
            ['film_id' => 2, 'genre_id' => 4, 'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp],
            ['film_id' => 3, 'genre_id' => 1, 'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp],
            ['film_id' => 3, 'genre_id' => 3, 'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp],
            ['film_id' => 4, 'genre_id' => 2, 'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp],
            ['film_id' => 4, 'genre_id' => 4, 'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp],
            ['film_id' => 5, 'genre_id' => 1, 'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp],
            ['film_id' => 5, 'genre_id' => 5, 'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp],
            ['film_id' => 6, 'genre_id' => 2, 'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp],
            ['film_id' => 6, 'genre_id' => 5, 'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp],
            ['film_id' => 7, 'genre_id' => 1, 'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp],
            ['film_id' => 7, 'genre_id' => 3, 'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp],
            ['film_id' => 8, 'genre_id' => 2, 'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp],
            ['film_id' => 8, 'genre_id' => 5, 'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp],
            ['film_id' => 9, 'genre_id' => 1, 'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp],
            ['film_id' => 9, 'genre_id' => 4, 'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp],
            ['film_id' => 10, 'genre_id' => 2, 'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp],
            ['film_id' => 10, 'genre_id' => 4, 'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp],
            // Add more relationships as needed
        ];

        // Insert the relationships into the film_genre table
        DB::table('film_genre')->insert($filmGenreRelationships);
    }
}

