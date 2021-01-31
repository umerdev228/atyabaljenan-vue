<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class CityTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //


        $faker = Faker::create();
        for ($i=0;$i<20;$i++) {
            $government = new \App\Government();
            $government->name = $faker->country;
            $government->name_ar = $faker->country.' (Arabic)';
            $government->delivery_charges = $faker->numberBetween(0, 10000);
            $government->save();
        }

        for ($i=0;$i<50;$i++) {
            $city = new \App\Area();
            $city->government_id=$faker->numberBetween(1,20);
            $city->name = $faker->city;
            $city->name_ar=$faker->city.' (Arabic)';
            $city->delivery_charges=$faker->numberBetween(0,100000);
            $city->save();
        }
    }
}
