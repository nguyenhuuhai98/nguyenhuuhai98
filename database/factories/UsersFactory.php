<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->email,
        'phone' => $faker->phoneNumber,
        'password' => bcrypt('password'),
        'role_id' => rand(1, 10),
        'address' => $faker->streetAddress,
        'gender' => rand(0, 1),
        'birthday' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'avatar' => $faker->imageUrl($width = 640, $height = 480, 'cats'),
        'created_at' => $faker->dateTime($max = 'now', $timezone = null),
        'updated_at' => $faker->dateTime($max = 'now', $timezone = null),
    ];
});
