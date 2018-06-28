<?php

use Faker\Generator as Faker;

$factory->define(App\Sell::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\User::class)->create()->id,
        'status_id' => App\Status::firstOrCreate(['name' => 'PROCESSING'])->id
    ];
});
