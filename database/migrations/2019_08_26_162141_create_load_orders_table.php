<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoadOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('load_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hash')->nullable();
            $table->string('contact_person')->nullable();;
            $table->unsignedInteger('customer_id')->nullable();;
            $table->dateTime('date_upload')->nullable();;
            $table->string('bill_to')->nullable();;
            $table->string('import_company')->nullable();;
            $table->string('constancy')->nullable();
            $table->string('payment_type_other')->nullable();
            $table->float('price')->nullable();
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
    }
}
