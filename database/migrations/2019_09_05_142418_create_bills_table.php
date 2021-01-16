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
            $table->string('num_bill')->nullable();
            $table->string('name_client')->nullable();
            $table->string('department_client')->nullable();
            $table->string('city_client')->nullable();
            $table->string('address_client')->nullable();
            $table->string('postal_cod_client')->nullable();
            $table->string('description')->nullable();
            $table->string('unit_price')->nullable();
            $table->string('price')->nullable();
            $table->string('iva')->nullable();
            $table->string('cif')->default('B-00000000')->nullable();
            $table->string('observations')->nullable();
            //$table->string('identificacion_fiscal');
            //$table->string('domicilio_fiscal');
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
