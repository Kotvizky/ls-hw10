<?php

use Illuminate\Database\Seeder;

class UserTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<5;$i++) {
        $faker = Faker\Factory::create();
        $user = new \App\User();
        $user->name = $faker->name;
        $user->email = $faker->email;
        $user->password = $faker->password(20);
        $user->save();
        }
    }
}
