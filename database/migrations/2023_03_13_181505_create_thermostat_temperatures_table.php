<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThermostatTemperaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thermostat_temperatures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('thermostat_id');
            $table->tinyInteger('temperature_value');
            $table->timestamp('snapshot_at');

            $table->foreign('thermostat_id')
                ->references('id')
                ->on('thermostats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thermostat_temperatures');
    }
}
