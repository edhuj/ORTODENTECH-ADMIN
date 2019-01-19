<?php

use Faker\Generator as Faker;

$factory->define(App\Question::class, function (Faker $faker) {
    return [
        'statement'=>$faker->sentence($nbWords = 6, $variableNbWords = true),
        'option1'=>$faker->word,
        'option2'=>$faker->word,
        'option3'=>$faker->word,
        'option4'=>$faker->word,
        'option5'=>$faker->word,
        'answer'=>$faker->numberBetween($min = 1, $max = 5),
        'topic'=>$faker->word,
    ];
});
