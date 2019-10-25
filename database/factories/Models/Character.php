<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factory
|--------------------------------------------------------------------------
*/


$factory->define(App\Models\Character::class, function (Faker $faker) {
    return [
        'player_id' => $faker->randomNumber(),
        'name' => $faker->name,
        'race' => $faker->word,
        'class' => $faker->word,
        'level' => $faker->word,
        'unique_thing' => $faker->word,
        'focus' => $faker->word,
        'start_date' => $faker->date(),
        'death_date' => $faker->date(),
        'notes' => $faker->text,
    ];
});

