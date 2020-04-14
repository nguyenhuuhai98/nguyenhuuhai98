<?php

use Illuminate\Database\Seeder;

class LessionsTableSeeder extends Seeder
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
            DB::table('lessions')->insert([
                'course_id' => rand(155, 209),
                'name' => $faker->name,
                'description' => $faker->text($maxNbChars = 200),
                'slug' => Str::slug($faker->name),
                'created_at' => $faker->dateTime($max = 'now', $timezone = null),
                'updated_at' => $faker->dateTime($max = 'now', $timezone = null),
        	]);
       	}
    }
}
