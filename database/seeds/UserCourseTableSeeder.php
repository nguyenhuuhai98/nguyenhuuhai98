<?php

use Illuminate\Database\Seeder;

class UserCourseTableSeeder extends Seeder
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
       		 DB::table('user_course')->insert([
	            'user_id' => rand(1,50),
	            'course_id' => rand(1,50),
	            'progress' => rand(1,100),
        	]);
       	}
    }
}
