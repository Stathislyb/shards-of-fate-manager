<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factory
|--------------------------------------------------------------------------
*/


$factory->define(App\Models\Player::class, function (Faker $faker) {
    return [
        'token' => $faker->word,
        'name' => $faker->name,
        'reputation' => $faker->randomNumber(),
        'notes' => $faker->text,
    ];
});

