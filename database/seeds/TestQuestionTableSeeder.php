<?php

use Illuminate\Database\Seeder;

class TestQuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create();

    	$limit = 300;

       	for ($i = 194; $i < $limit; $i++) {
       		 DB::table('test_question')->insert([
	            'test_id' => $i,
	            'question_id' => rand(71,211),
        	]);
       	}
    }
}
