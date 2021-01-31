<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class ProductTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=0;$i<20;$i++){
         $category=new \App\Category();
         $category->category=$faker->safeColorName;
         $category->category_ar=$faker->safeColorName;
         $category->save();

        }

        for ($i=0;$i<100;$i++){
            $myCat=\App\Category::all();
            $product=new \App\Product();
            $product->category_id=$myCat[$faker->numberBetween(0,19)]->id;
            $product->name=$faker->company;
            $product->description=$faker->text(400);
            $product->name_ar=$faker->company. '(Arabic)';
            $product->description_ar=$faker->text(500) .' (Arabic) ';
            $product->price=$faker->numberBetween(5,100);
            $product->stock=$faker->numberBetween(0,40);
            $product->display='yes';
            $product->manage_stock='yes';
            $product->image=$faker->imageUrl(540,480,null,true);
            $product->save();
        }





        //
    }
}
