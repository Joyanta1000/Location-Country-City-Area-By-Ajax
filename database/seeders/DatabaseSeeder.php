<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Country::factory(100)->create();
        \App\Models\City::factory()
            ->has(\App\Models\Country::factory()->count(1), 'country')
            ->state(new Sequence(
                fn ($sequence) => ['countryid' => Country::all()->random()],
            ))
            ->count(100*100)
            ->create();
        \App\Models\Area::factory()
            ->has(\App\Models\City::factory()->count(1), 'city')
            ->state(new Sequence(
                fn ($sequence) => ['cityid' => City::all()->random()],
            ))
            ->count(100*100*100)
            ->create();
    }
}
