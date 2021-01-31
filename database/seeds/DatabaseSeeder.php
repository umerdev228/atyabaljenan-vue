<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         $this->call(UserSeeder::class);
        $this->call(ProductTableSeed::class);
        $this->call(CityTableSeed::class);
        $this->call(UserTableSeed::class);
        $this->call(StatusTableSeed::class);
        $this->call(ScheduleTableSeeed::class);
    }
}
