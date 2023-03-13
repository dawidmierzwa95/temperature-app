<?php

namespace App\Repositories;

interface ThermostatTemperatureRepositoryInterface {
    public function getHistoricalTemperaturesByThermostatId($dateFrom, $dateTo);
}
