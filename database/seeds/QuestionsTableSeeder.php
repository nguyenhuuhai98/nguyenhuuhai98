<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create();

    	$limit = 100;

       	for ($i = 0; $i < $limit; $i++) {
       		 DB::table('questions')->insert([
                'text' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'created_at' => $faker->dateTime($max = 'now', $timezone = null),
                'updated_at' => $faker->dateTime($max = 'now', $timezone = null),
        	]);
       	}
    }
}
