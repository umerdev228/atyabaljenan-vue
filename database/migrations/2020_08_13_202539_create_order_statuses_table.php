<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('status')->nullable();
            $table->string('status_ar')->nullable();
            $table->text('desc')->nullable();
            $table->text('desc_ar')->nullable();
            $table->enum('is_default',['yes','no'])->nullable();
            $table->enum('is_last',['yes','no'])->nullable();
            $table->unsignedBigInteger('order')->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_statuses');
    }
}
