<?php

namespace App\Repositories;

use App\Models\ThermostatTemperature;

class ThermostatTemperatureRepository
    extends BaseRepository
    implements ThermostatTemperatureRepositoryInterface {

    private $model;

    public function __construct(ThermostatTemperature $thermostatTemperature) {
        $this->model = $thermostatTemperature;
        parent::__construct($thermostatTemperature);
    }

    public function getHistoricalTemperaturesByThermostatId($dateFrom, $dateTo) {
        /**
         * Implementation of...
         */
    }
}
