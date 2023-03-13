<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThermostatTemperature extends Model
{
    use HasFactory;

    protected $fillable = [
        "temperature_value",
        "snapshot_at"
    ];

    public $timestamps = false;

    public function thermostat() {
        return $this->belongsTo(Thermostat::class,'id', 'thermostat_id');
    }
}
