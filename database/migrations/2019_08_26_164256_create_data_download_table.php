<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataDownloadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_download', function (Blueprint $table) {
            $table->increments('id');
            $table->string('contact_download')->nullable();;
            $table->integer('load_orders_id')->unsigned()->nullable();;
            $table->integer('driver_data_id')->unsigned()->nullable();;
            $table->string('cmr')->nullable();;
            $table->string('observations')->nullable();;
            $table->string('addresses_download')->nullable();;
            $table->integer('countries_id')->nullable();;
            $table->string('city_download')->nullable();;
            $table->string('postal_cod_download')->nullable();;
            $table->string('mobile_download')->nullable();;
            $table->timestamps();

            $table->foreign('load_orders_id')->references('id')->on('load_orders');
            $table->foreign('driver_data_id')->references('id')->on('driver_data');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_download');
    }
}
