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
            $table->string('contact_download');
            $table->integer('load_orders_id')->unsigned();
            $table->integer('driver_data_id')->unsigned();
            $table->string('cmr');
            $table->string('observations');
            $table->string('addresses_download');
            $table->string('city_download');
            $table->string('postal_cod_download');
            $table->string('mobile_download');
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
