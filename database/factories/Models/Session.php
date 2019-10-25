<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factory
|--------------------------------------------------------------------------
*/


$factory->define(App\Models\Session::class, function (Faker $faker) {
    return [
        'episode_id' => $faker->randomNumber(),
        'user_id' => $faker->randomNumber(),
        'hook' => $faker->text,
        'public_description' => $faker->text,
        'private_description' => $faker->text,
        'starts_at' => $faker->dateTimeBetween(),
    ];
});

