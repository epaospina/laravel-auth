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
            $table->string('contact_person');
            $table->unsignedInteger('customer_id');
            $table->dateTime('date_upload');
            $table->string('bill_to');
            $table->string('import_company');
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
