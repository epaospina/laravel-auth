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
            $table->string('contact_person');
            $table->integer('load_order_id')->unsigned();
            $table->integer('driver_data')->unsigned();
            $table->string('cmr');
            $table->string('observations');
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
        Schema::dropIfExists('data_download');
    }
}
