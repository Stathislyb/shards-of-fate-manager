<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factory
|--------------------------------------------------------------------------
*/


$factory->define(App\Models\Focus::class, function (Faker $faker) {
    return [
        'chapter_id' => $faker->randomNumber(),
        'name' => $faker->name,
        'description' => $faker->text,
    ];
});

