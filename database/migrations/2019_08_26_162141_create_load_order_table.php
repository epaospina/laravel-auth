<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoadOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('load_order', function (Blueprint $table) {
            $table->increments('id');
            $table->string('contact_person');
            $table->integer('client_car')->unsigned();
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
