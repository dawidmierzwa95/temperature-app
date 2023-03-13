<?php

namespace Database\Seeders;

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
        \App\Models\Thermostat::factory()
            ->count(1)
            ->create();

        \App\Models\ThermostatTemperature::factory()
            ->count(10)
            ->create();
    }
}
