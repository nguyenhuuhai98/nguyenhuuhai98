<?php

use Illuminate\Database\Seeder;

class UserLessionTableSeeder extends Seeder
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
       		 DB::table('user_lession')->insert([
	            'user_id' => rand(1,50),
	            'lession_id' => rand(1,50),
	            'status' => rand(1,3),
	            'result' => rand(1,10),
        	]);
       	}
    }
}
