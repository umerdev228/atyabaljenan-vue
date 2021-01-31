<?php

use Illuminate\Database\Seeder;

class UserTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $adminRole=new \App\Role();
        $adminRole->name='Owner';
        $adminRole->desc='Admin Power Full';
        $adminRole->status='Active';
        $adminRole->save();

        $customerRole=new \App\Role();
        $customerRole->name='Staff';
        $customerRole->desc='The Buyer Who`s Buy Food';
        $customerRole->status='Active';
        $customerRole->save();


        $faker = \Faker\Factory::create();

        //Admin
        $user=new \App\User();
        $user->name=$faker->name;
        $user->email='admin@gmail.com';
        $user->password=bcrypt('123456');
        $user->picture='007-boy-2.svg';
        $user->phone=$faker->phoneNumber;
        $user->address=$faker->address;
        $user->save();

        $user->roles()->attach($adminRole);


        $types=['Staff','Owner'];
        $type=$faker->numberBetween(0,1);
        for ($i=0;$i<100;$i++) {
            $user = new \App\User();
            $user->name = $faker->name;
            $user->email = $faker->email;
            $user->password = bcrypt('123456');
            $user->picture = '007-boy-2.svg';
            $user->phone = $faker->phoneNumber;
            $user->address = $faker->address;
            $user->save();

            $role=\App\Role::where('name',$types[$type])->first();
            if ($role){
                $user->roles()->attach($role);
            }
        }
    }
}
