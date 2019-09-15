<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information_car', function (Blueprint $table) {
            $table->increments('id');
            $table->string('model_car');
            $table->string('color_car');
            $table->string('vin')->unique();
            $table->string('documents');
            $table->unsignedInteger('customer_id');
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('information_car');
    }
}
