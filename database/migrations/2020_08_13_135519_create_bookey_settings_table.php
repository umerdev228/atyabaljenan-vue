<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookeySettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookey_settings', function (Blueprint $table) {
            $table->id();
            $table->string('mid')->nullable();
            $table->string('secrete')->nullable();
            $table->string('status')->nullable();
            $table->double('min_order')->nullable();
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
        Schema::dropIfExists('bookey_settings');
    }
}
