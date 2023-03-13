<?php

namespace App\Repositories;

interface ThermostatRepositoryInterface {
    public function getOwnerEmail($thermostatId);
    public function addTemperatureSnapshot($thermostatId, $temperatureValue, $snapshotAt);
}
