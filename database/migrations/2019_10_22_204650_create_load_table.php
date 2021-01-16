<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_load', function (Blueprint $table) {
            $table->increments('id');
            $table->string('addresses_load')->nullable();;
            $table->integer('countries_id')->nullable();;
            $table->string('city_load')->nullable();;
            $table->string('postal_cod_load')->nullable();;
            $table->string('phone_load')->nullable();;
            $table->string('mobile_load')->nullable();;
            $table->date('date_load')->nullable();
            $table->unsignedInteger('load_orders_id');
            $table->timestamps();

            $table->foreign('load_orders_id')->references('id')->on('load_orders');
            //$table->foreign('countries_id')->references('id')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
