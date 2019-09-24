<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');
            $table->string('num_bill');
            $table->string('name_client');
            $table->string('department_client');
            $table->string('city_client');
            $table->string('address_client');
            $table->string('postal_cod_client');
            $table->string('description');
            $table->string('unit_price');
            $table->string('price');
            $table->string('iva');
            $table->string('cif')->default('B-00000000');
            $table->string('observations');
            $table->string('payment_type')->default('Transferencia Bancaria');
            $table->integer('load_orders_id')->unsigned();
            $table->timestamps();

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
        Schema::dropIfExists('bills');
    }
}
