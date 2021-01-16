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
            $table->string('model_car')->nullable();
            $table->string('color_car')->nullable();
            $table->string('vin')->unique()->nullable();
            $table->string('documents')->nullable();
            $table->boolean('process_finish')->default(false);
            $table->boolean('is_pending')->default(true);
            $table->unsignedInteger('customer_id')->nullable();
            $table->unsignedInteger('load_orders_id')->nullable();
            $table->boolean('status')->default(1);
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
