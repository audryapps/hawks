<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Goal;
use Faker\Generator as Faker;

$factory->define(App\Goal::class, function (Faker $faker) {
    return [
	    'curso_id' => \App\Curso::all()->random()->id,
	    'goal' => $faker->sentence
    ];
});