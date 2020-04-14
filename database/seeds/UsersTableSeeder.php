<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
       		 DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'phone' => $faker->phoneNumber,
                'password' => bcrypt('password'),
                'role_id' => 2,
                'address' => $faker->streetAddress,
                'gender' => rand(0, 1),
                'birthday' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'avatar' => $faker->imageUrl($width = 640, $height = 480, 'cats'),
                'created_at' => $faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now', $timezone = null),
                'updated_at' => $faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now', $timezone = null),
                // 'created_at' => $faker->dateTime($min = '2017-01-1 00:00:01', $max = 'now', $timezone = null),
                // 'updated_at' => $faker->dateTime($min = '2017-01-1 00:00:01', $max = 'now', $timezone = null),
        	]);
       	}
    }
}
