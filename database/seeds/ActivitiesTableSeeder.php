<?php

use Illuminate\Database\Seeder;

class ActivitiesTableSeeder extends Seeder
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
       		 DB::table('activities')->insert([
	            'name' => $faker->name,
	            'user_id' => rand(1,50),
	            'type' => Str::random(10),
        	]);
       	}
    }
}
