<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresupuestoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presupuesto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo_vehiculo');
            $table->string('telefono');
            $table->string('modelo');
            $table->string('email');
            $table->string('desde');
            $table->string('hasta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presupuesto');
    }
}
