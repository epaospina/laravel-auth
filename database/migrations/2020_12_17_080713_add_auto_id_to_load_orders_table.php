<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAutoIdToLoadOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('load_orders', function (Blueprint $table) {
            $table->string('auto_id')->nullable();
            $table->string('pick_up')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('load_orders', function (Blueprint $table) {
            $table->string('auto_id');
            $table->string('pick_up');
        });
    }
}
