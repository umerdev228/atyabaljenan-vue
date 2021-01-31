<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateOrdersTableSchedual extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
            $table->enum('order_type',['Delivery','Schedual'])->default('Delivery')->nullable();
            $table->string('time_desc')->nullable();
            $table->unsignedBigInteger('schedual_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        $table->dropColumn('order_type');
        $table->dropColumn('schedual_id');
        $table->dropColumn('time_desc');
        });

    }
}
