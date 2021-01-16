<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddArrayCarsToOrderCmrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_cmr', function (Blueprint $table) {
            $table->string('array_cars');
            $table->integer('user_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_cmr', function (Blueprint $table) {
            $table->string('array_cars');
            $table->integer('user_id')->unsigned();
        });
    }
}
