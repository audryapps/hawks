<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Curso;
use Faker\Generator as Faker;

$factory->define(Curso::class, function (Faker $faker) {
    $name = $faker->sentence;
    $status= $faker->randomElement([\App\Curso::PUBLISHED, \App\Curso:: PENDING, \App\Curso::REJECTED]);
    return [
        'teacher_id' => \App\Teacher::all()->random()->id,
        'category_id'=> \App\Category::all()->random()->id,
        'level_id'=> \App\Level::all()->random()->id,
        'name' =>$name,
        'slug' => Str::slug($name,'-'),
        'description'=>$faker->paragraph,
        'picture' => $faker->image('storage/app/public/cursos',400,300, 'people', false),
        'status'=>$status,
        'previous_approved'=>$status !== \App\Curso::PUBLISHED ? false : true,
        'previous_reject'=>$status === \App\Curso::REJECTED ? true : false,

    ];
});
