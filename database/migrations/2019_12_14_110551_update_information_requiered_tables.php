<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateInformationRequieredTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('information_car', function (Blueprint $table) {
            $table->string('color_car')->nullable()->change();
        });

        Schema::table('data_load', function (Blueprint $table) {
            $table->string('phone_load')->nullable()->change();
        });

        Schema::table('customer', function (Blueprint $table) {
            $table->string('phone')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('information_car', function (Blueprint $table) {
            $table->string('color_car')->change();
        });

        Schema::table('data_load', function (Blueprint $table) {
            $table->string('phone_load')->change();
        });

        Schema::table('customer', function (Blueprint $table) {
            $table->string('phone')->change();
        });
    }
}
