<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker =Faker\Factory::create();

        User::create([
            "first_name"=>"root",
            "last_name"=>"root",
            "email"=>"mfc2005@ukr.net",
            "role"=>"admin",
            "password"=>bcrypt("123456789")
        ]);

        foreach(range(2,31) as $i){
            User::create([
                "first_name"=>$faker->firstName,
                "last_name"=>$faker->lastName,
                "email"=>$faker->email,
                "role"=>"editor",
                "password"=>bcrypt("123456789")
            ]);
        }
    }
}
