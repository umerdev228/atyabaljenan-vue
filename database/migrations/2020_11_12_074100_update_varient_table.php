<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateVarientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('variants', function (Blueprint $table) {
            //
            $table->double('price_bd')->nullable();
            $table->double('price_omr')->nullable();
            $table->double('price_qar')->nullable();
            $table->double('price_sar')->nullable();
            $table->double('price_aed')->nullable();
            $table->double('price_usd')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('variants', function (Blueprint $table) {
            //
            $table->dropColumn('price_bd');
            $table->dropColumn('price_omr');
            $table->dropColumn('price_qar');
            $table->dropColumn('price_sar');
            $table->dropColumn('price_aed');
            $table->dropColumn('price_usd');
        });
    }
}
