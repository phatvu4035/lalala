<?php

use Faker\Generator as Faker;

$factory->define(App\Friends::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 1, $max = 30),
        'friend_id' => $faker->numberBetween($min = 1, $max = 30),
    ];
});
