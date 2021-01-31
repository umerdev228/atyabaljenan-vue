<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->nullable();
            $table->string('site_name_ar')->nullable();
            $table->string('site_email')->nullable();
            $table->text('site_description')->nullable();
            $table->text('site_description_ar')->nullable();
            $table->string('currency')->nullable();
            $table->string('currency_symbol')->nullable();
            $table->string('logo')->nullable();
            $table->string('background')->nullable();
            $table->string('favicon')->nullable();

            $table->text('delivery_info')->nullable();
            $table->text('delivery_info_ar')->nullable();
            $table->time('open_from')->nullable();
            $table->time('open_to')->nullable();
            $table->enum('accepting_cash_delivery',['Yes','No'])->nullable();
            $table->string('time_zone')->nullable();
            $table->string('button_color')->nullable();
            $table->string('background_color')->nullable();
            $table->string('category_color')->nullable();



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
        Schema::dropIfExists('settings');
    }
}
