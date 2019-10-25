<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factory
|--------------------------------------------------------------------------
*/


$factory->define(App\Models\Npc::class, function (Faker $faker) {
    return [
        'token' => $faker->word,
        'name' => $faker->name,
        'description' => $faker->text,
        'public_notes' => $faker->text,
        'private_notes' => $faker->text,
    ];
});

