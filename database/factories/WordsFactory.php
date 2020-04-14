<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Word;
use Faker\Generator as Faker;

$factory->define(Word::class, function (Faker $faker) {
    return [
        'lession_id' => rand(1, 50),
        'key_word' => $faker->word,
        'sentence' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'created_at' => $faker->dateTime($max = 'now', $timezone = null),
        'updated_at' => $faker->dateTime($max = 'now', $timezone = null),
    ];
});
