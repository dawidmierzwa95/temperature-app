<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Thermostat extends Model
{
    use HasFactory;
    use Notifiable;

    public function temperatures() {
        return $this->hasMany(ThermostatTemperature::class,'thermostat_id', 'id');
    }
}
