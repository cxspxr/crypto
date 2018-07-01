<?php

use Faker\Generator as Faker;

$factory->define(App\Ticket::class, function (Faker $faker) {
    $user = App\User::inRandomOrder()->first();
    return [
        'content' => $faker->realText(),
        'is_open' => $faker->boolean,
        'user_id' => $user->id,
        'sell_id' => $user->sells()->inRandomOrder()->first()->id
    ];
});
