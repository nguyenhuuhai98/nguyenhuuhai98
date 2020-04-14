<?php

use Illuminate\Database\Seeder;

class WordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create();

    	$limit = 20;

       	for ($i = 0; $i < $limit; $i++) {
       		 DB::table('words')->insert([
	            'lession_id' => rand(1,50),
	            'key_word' => Str::random(10),
	            'sentence' => Str::random(10),
        	]);
       	}
    }
}
