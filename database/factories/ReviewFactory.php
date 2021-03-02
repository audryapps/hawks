<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'curso_id' => \App\Course::all()->random()->id,
        'rating'=>$faker->randomFloat(nbMaxDecimals:2,min:1,max:5)
    ];
});
