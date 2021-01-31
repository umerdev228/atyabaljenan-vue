<?php

use Illuminate\Database\Seeder;

class ScheduleTableSeeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $monday=new \App\Schedule();
        $monday->day="monday";
        $monday->status="on";
        $monday->save();

        $tuesday=new \App\Schedule();
        $tuesday->day="tuesday";
        $tuesday->status="on";
        $tuesday->save();

        $wednesday=new \App\Schedule();
        $wednesday->day="wednesday";
        $wednesday->status="on";
        $wednesday->save();

        $thursday=new \App\Schedule();
        $thursday->day="thursday";
        $thursday->status="on";
        $thursday->save();

        $friday=new \App\Schedule();
        $friday->day="friday";
        $friday->status="on";
        $friday->save();

        $saturday=new \App\Schedule();
        $saturday->day="saturday";
        $saturday->status="on";
        $saturday->save();

        $sunday=new \App\Schedule();
        $sunday->day="sunday";
        $sunday->status="on";
        $sunday->save();
    }
}
