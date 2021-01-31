<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();

            //Adresses Here
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
        Schema::dropIfExists('customers');
    }
}
