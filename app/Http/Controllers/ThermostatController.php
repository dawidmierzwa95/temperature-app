<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreThermostatTemperature;
use App\Notifications\TooLowTemperatureDetected;
use App\Repositories\ThermostatRepositoryInterface;

class ThermostatController extends Controller
{
    public function storeTemperatureSnapshot(
        StoreThermostatTemperature $request,
        ThermostatRepositoryInterface $thermostatRepository
    ) {
        $thermostatId = $request->get('device_id');
        $temperatureValue = $request->get('temperature');
        $snapshotAt = $request->get('date');

        if($temperatureValue <= env('MIN_TEMPERATURE_TO_SEND_NOTIFY', 15)) {
            $thermostat = $thermostatRepository->show($thermostatId);

            $thermostat->notify(
                new TooLowTemperatureDetected(
                    $temperatureValue,
                    $snapshotAt
                )
            );
        }

        $isSnapshotAdded = $thermostatRepository->addTemperatureSnapshot(
            $thermostatId,
            $temperatureValue,
            $snapshotAt
        );

        if($isSnapshotAdded) {
            return response(
                ['status'=>'success'],
                200
            );
        }

        return response(
            ['status'=>'error'],
            400
        );
    }
}
