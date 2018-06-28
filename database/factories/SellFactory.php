<?php

use Faker\Generator as Faker;

$factory->define(App\Sell::class, function (Faker $faker) {
    return [
        'user_id' => App\User::inRandomOrder()->first()->id,
        'status_id' => App\Status::inRandomOrder()->first()->id,
        'transaction' => Hash::make(str_random(230)),
        'ticker_id' => App\Ticker::inRandomOrder()->first()->id
    ];
});
