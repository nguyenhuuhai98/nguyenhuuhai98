<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Course;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'cate_id' => rand(2, 50),
        'name' => $faker->name,
        'slug' => Str::slug($faker->name),
        'avatar' => $faker->imageUrl($width = 640, $height = 480, 'cats'),
        'created_at' => $faker->dateTime($max = 'now', $timezone = null),
        'updated_at' => $faker->dateTime($max = 'now', $timezone = null),
    ];
});
