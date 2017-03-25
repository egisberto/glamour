<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnsCompany extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company', function (Blueprint $table) {
            $table->string('email')->nullable()->change();
            $table->longText('description')->nullable()->change();
            $table->longText('os_description')->nullable()->change();
            $table->binary('logo')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company', function (Blueprint $table) {
            $table->string('email')->change();
            $table->longText('description')->change();
            $table->longText('os_description')->change();
            $table->binary('logo')->change();
        });
    }
}
