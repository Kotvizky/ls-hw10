<?php

use Illuminate\Database\Seeder;

class CategoryTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<5;$i++)
        {
            $faker = Faker\Factory::create();
            $product = new \App\Category();
            $product->name = $faker->name;
            $product->desc = $faker->realText();
            $product->save();
        }
    }
}
