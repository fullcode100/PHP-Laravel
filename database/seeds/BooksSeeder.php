<?php

use Illuminate\Database\Seeder;

use App\Models\Books\Book;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker =Faker\Factory::create();

        foreach(range(1,30) as $i){
            Book::create([
                'author'=>$faker->firstName.','.$faker->lastName,
                'year'=>$faker->year($max = 'now'),
                'genre'=>$faker->sentence($nbWords = 2, $variableNbWords = true),
                'title'=>$faker->sentence($nbWords = 6, $variableNbWords = true),
                'book_user_id'=>mt_rand(1,30)
            ]);
        }
    }
}
