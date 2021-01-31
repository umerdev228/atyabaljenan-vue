<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('promo_code_id')->nullable();
            $table->unsignedBigInteger('order_no')->nullable();
            $table->unsignedBigInteger('government_id')->nullable();
            $table->unsignedBigInteger('area_id')->nullable();
            $table->double('delivery_charges')->nullable();
            $table->unsignedBigInteger('status_id')->nullable();
            $table->text('note')->nullable();
            $table->double('discount')->nullable();
            $table->double('tax')->nullable();
            $table->double('subtotal')->nullable();
            $table->string('payment_type')->nullable();
            $table->double('total')->nullable();
            $table->text('cart')->nullable();
            //Addresses


            $table->string('type')->nullable();
            $table->string('house')->nullable();
            $table->text('block')->nullable();
            $table->text('avanue')->nullable();
            $table->text('building')->nullable();
            $table->text('floor')->nullable();
            $table->text('officeno')->nullable();
            $table->text('special_dir')->nullable();
            $table->text('street')->nullable();





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
        Schema::dropIfExists('orders');
    }
}
