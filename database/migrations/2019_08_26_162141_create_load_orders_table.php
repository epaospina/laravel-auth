<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoadOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('load_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('contact_person');
            $table->integer('client_car_id')->unsigned();
            $table->dateTime('date_upload');
            $table->string('buyer');
            $table->string('importing_company');
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
        Schema::dropIfExists('upload_download');
    }
}
