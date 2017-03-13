<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeingKeysToCompany extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Tables from InventoryManager 
        Schema::table('categories', function (Blueprint $table) {
            $table->integer('company_id')->nullable()->unsigned();
            $table->foreign('company_id')->references('id')->on('company');
        });

        Schema::table('inventories', function (Blueprint $table) {
            $table->integer('company_id')->nullable()->unsigned();
            $table->foreign('company_id')->references('id')->on('company');
        });

        Schema::table('locations', function (Blueprint $table) {
            $table->integer('company_id')->nullable()->unsigned();
            $table->foreign('company_id')->references('id')->on('company');
        });

        Schema::table('suppliers', function (Blueprint $table) {
            $table->integer('company_id')->nullable()->unsigned();
            $table->foreign('company_id')->references('id')->on('company');
        });

        // App Tables
        Schema::table('sale', function (Blueprint $table) {
            $table->integer('company_id')->nullable()->unsigned();
            $table->foreign('company_id')->references('id')->on('company');
        });

        Schema::table('client', function (Blueprint $table) {
            $table->integer('company_id')->nullable()->unsigned();
            $table->foreign('company_id')->references('id')->on('company');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->integer('company_id')->nullable()->unsigned();
            $table->foreign('company_id')->references('id')->on('company');
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
