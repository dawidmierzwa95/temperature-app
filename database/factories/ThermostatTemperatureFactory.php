<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ThermostatTemperatureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'thermostat_id' => 1,
            'temperature_value' => $this->faker->unique()->numberBetween(-5, 25),
            'snapshot_at' => now()->addMinutes(rand(1, 99))
        ];
    }
}
