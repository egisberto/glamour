<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalePayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_payment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sale_id')->unsigned();
            $table->integer('payment_method_id')->unsigned();
            $table->float('value', 8, 2)->nullable(false);
            $table->string('bandeira')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();

            // Foreign Keys
            $table->foreign('sale_id')->references('id')->on('sale');
            $table->foreign('payment_method_id')->references('id')->on('payment_method');

            // Soft Deletes
            // $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale_payment');
    }
}
