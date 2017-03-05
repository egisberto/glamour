<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObsReceitaCondicoesPagSale extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sale', function (Blueprint $table) {
            //Description & Payment Conditions
            $table->text('description');
            $table->text('condition');

            // Receituário
            $table->float('longe_od_esferico', 4, 2)->nullable();
            $table->float('longe_od_cilindrico', 4, 2)->nullable();
            $table->float('longe_od_eixo', 4, 2)->nullable();
            $table->float('longe_od_dp', 4, 2)->nullable();

            $table->float('longe_oe_esferico', 4, 2)->nullable();
            $table->float('longe_oe_cilindrico', 4, 2)->nullable();
            $table->float('longe_oe_eixo', 4, 2)->nullable();
            $table->float('longe_oe_dp', 4, 2)->nullable();

            $table->float('perto_od_esferico', 4, 2)->nullable();
            $table->float('perto_od_cilindrico', 4, 2)->nullable();
            $table->float('perto_od_eixo', 4, 2)->nullable();
            $table->float('perto_od_dp', 4, 2)->nullable();

            $table->float('perto_oe_esferico', 4, 2)->nullable();
            $table->float('perto_oe_cilindrico', 4, 2)->nullable();
            $table->float('perto_oe_eixo', 4, 2)->nullable();
            $table->float('perto_oe_dp', 4, 2)->nullable();
            
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
            $table->dropColumn('description');
            $table->dropColumn('condition');
            $table->dropColumn('longe_od_esferico', 4, 2);
            $table->dropColumn('longe_od_cilindrico', 4, 2);
            $table->dropColumn('longe_od_eixo', 4, 2);
            $table->dropColumn('longe_od_dp', 4, 2);
            $table->dropColumn('longe_oe_esferico', 4, 2);
            $table->dropColumn('longe_oe_cilindrico', 4, 2);
            $table->dropColumn('longe_oe_eixo', 4, 2);
            $table->dropColumn('longe_oe_dp', 4, 2);
            $table->dropColumn('perto_od_esferico', 4, 2);
            $table->dropColumn('perto_od_cilindrico', 4, 2);
            $table->dropColumn('perto_od_eixo', 4, 2);
            $table->dropColumn('perto_od_dp', 4, 2);
            $table->dropColumn('perto_oe_esferico', 4, 2);
            $table->dropColumn('perto_oe_cilindrico', 4, 2);
            $table->dropColumn('perto_oe_eixo', 4, 2);
            $table->dropColumn('perto_oe_dp', 4, 2);
        });
    }
}
