<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabObsAndAdicaoOnSale extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sale', function (Blueprint $table) {
            //Lab Description 
            $table->text('description_lab')->nullable();
            
            // Receituário - For old people
            $table->float('addition', 6, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sale', function (Blueprint $table) {
            $table->dropColumn('description_lab');
            $table->dropColumn('addition');
        });
    }
}
