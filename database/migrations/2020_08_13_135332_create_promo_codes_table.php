<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromoCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promo_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->nullable();
            $table->enum('type',['percentage','fixed'])->nullable();
            $table->text('description')->nullable();
            $table->text('description_ar')->nullable();
            $table->double('percentage')->nullable();
            $table->double('amount')->nullable();
            $table->enum('status',['active','inactive'])->default('active')->nullable();
            $table->timestamp('active_until')->nullable();
            $table->unsignedBigInteger('limited_usage')->nullable();
            $table->unsignedBigInteger('customer_usage')->nullable();
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
        Schema::dropIfExists('promo_codes');
    }
}
