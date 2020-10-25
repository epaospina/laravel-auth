<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrderIdToInfoCars extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('information_car', function (Blueprint $table) {
            $table->unsignedBigInteger('load_orders_id')->default(1);

            $table->foreign('load_orders_id')->references('id')->on('load_orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('info_cars', function (Blueprint $table) {
            //
        });
    }
}
