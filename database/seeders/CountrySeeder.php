<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;


class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {

        Country::factory(20)->create();
    }
}

