<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customer', function (Blueprint $table) {
            $table->renameColumn('addresses_load', 'addresses');
            $table->renameColumn('city_load', 'city');
            $table->renameColumn('postal_cod_load', 'postal_cod');
            $table->renameColumn('phone_load', 'phone');
            $table->renameColumn('mobile_load', 'mobile');
            $table->renameColumn('fax', 'email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
