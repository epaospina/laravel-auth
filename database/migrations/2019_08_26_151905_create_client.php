<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();;
            $table->string('signing')->nullable();;
            $table->string('addresses')->nullable();;
            $table->string('city')->nullable();;
            $table->string('postal_cod')->nullable();;
            $table->string('phone')->nullable();;
            $table->string('mobile')->nullable();;
            $table->string('email')->nullable();;
            $table->string('province')->nullable();
            $table->boolean('status')->default(1);
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
    }
}
