<?php

use Illuminate\Database\Seeder;

class UserWordTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create();

    	$limit = 10;

       	for ($i = 0; $i < $limit; $i++) {
       		 DB::table('user_word')->insert([
	            'user_id' => rand(1,50),
	            'word_id' => rand(1,50),
        	]);
       	}
    }
}
