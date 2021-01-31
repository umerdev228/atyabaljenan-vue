<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->string('slug_ar')->unique()->nullable();
            $table->string('name')->nullable();
            $table->string('name_ar')->nullable();
            $table->string('image')->nullable();
            $table->double('price')->nullable();
            $table->double('stock')->nullable()->default(0);
            $table->text('description')->nullable();
            $table->text('description_ar')->nullable();
            $table->enum('display',['yes','no'])->nullable();
            $table->enum('manage_stock',['yes','no'])->nullable();
            $table->timestamps();


//            $table->foreign('category_id')->references('id')->on('categories')
//                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
