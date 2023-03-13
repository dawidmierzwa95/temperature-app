<?php

namespace App\Repositories;

use App\Models\Thermostat;

class ThermostatRepository
    extends BaseRepository
    implements ThermostatRepositoryInterface {

    private $model;

    public function __construct(Thermostat $thermostat) {
        $this->model = $thermostat;
        parent::__construct($thermostat);
    }

    public function getOwnerEmail($thermostatId) {
        return $this->model->select('email')->find($thermostatId);
    }
    public function addTemperatureSnapshot($thermostatId, $temperatureValue, $snapshotAt) {
        return $this->model
            ->find($thermostatId)
            ->temperatures()
            ->create([
                'temperature_value' => $temperatureValue,
                'snapshot_at' => $snapshotAt
            ]);
    }
}
