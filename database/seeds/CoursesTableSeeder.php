<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create();

    	$limit = 50;

       	for ($i = 0; $i < $limit; $i++) {
       		 DB::table('courses')->insert([
                'cate_id' => rand(60, 66),
                'name' => $faker->name,
                'slug' => Str::slug($faker->name),
                'created_at' => $faker->dateTime($max = 'now', $timezone = null),
                'updated_at' => $faker->dateTime($max = 'now', $timezone = null),
            ]);
       	}
    }
}
