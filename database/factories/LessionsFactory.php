<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Lession;
use Faker\Generator as Faker;

$factory->define(Lession::class, function (Faker $faker) {
    return [
        'course_id' => rand(1, 10),
        'name' => $faker->name,
        'description' => $faker->text($maxNbChars = 200),
        'slug' => Str::slug($faker->name),
        'created_at' => $faker->dateTime($max = 'now', $timezone = null),
        'updated_at' => $faker->dateTime($max = 'now', $timezone = null),
    ];
});
