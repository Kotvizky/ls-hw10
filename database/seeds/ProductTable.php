<?php

use Illuminate\Database\Seeder;

class ProductTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<30;$i++)
        {
            $faker = Faker\Factory::create();
            $product = new \App\Product();
            $product->category_id = rand(0,4);
            $product->name = $faker->text(50);
            $product->desc = $faker->realText();
            $product->price = rand(100,10000)/100;
            $product->created_at = $faker->dateTime;
            $product->save();
        }
    }
}
