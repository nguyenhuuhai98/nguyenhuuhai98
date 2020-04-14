<?php

use Illuminate\Database\Seeder;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create();

    	$limit = 212;

       	for ($i = 111; $i < $limit; $i++) {
       		 DB::table('answers')->insert([
                'question_id' => $i,
                'text' => $faker->word,
                'true_answer' => 0,
                'created_at' => $faker->dateTime($max = 'now', $timezone = null),
                'updated_at' => $faker->dateTime($max = 'now', $timezone = null),
        	]);
       	}
    }
}
