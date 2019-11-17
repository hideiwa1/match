<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
			'title' => $faker -> text($maxNbChars = 190),
			'comment' => $faker -> text,
			'min_price' => $faker -> numberBetween($min = 1, $max = 100),
			'max_price' => $faker -> numberBetween($min = 1, $max = 100),
			'category_id' => $faker -> numberBetween($min = 1, $max = 2),
			'user_id' => $faker -> randomElement(['1','11','21','31','41','51','61']),
			'delete_flg' => false
    ];
});
