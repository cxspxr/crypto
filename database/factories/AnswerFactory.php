<?php

use Faker\Generator as Faker;

$factory->define(App\Answer::class, function (Faker $faker) {
    return [
        'content' => $faker->realText(),
        'is_response' => $faker->boolean,
        'ticket_id' => App\Ticket::inRandomOrder()->first()->id,
        'read' => $faker->boolean
    ];
});
