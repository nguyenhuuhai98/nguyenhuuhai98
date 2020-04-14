<?php

use Illuminate\Database\Seeder;

class FollowingTableSeeder extends Seeder
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
       		 DB::table('following')->insert([
	            'user_id' => 22,
	            'user_follow_id' => rand(1,20),
        	]);
       	}
    }
}
