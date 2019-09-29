<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Service\Service;

use Faker\Generator as Faker;

$factory->define(Service::class, function (Faker $faker) {
    return [
        'title' => $faker->jobTitle,
        'body' => $faker->realText(400),
        'category_id' => random_int(11,20),
        'user_id' => \App\Models\User::all()->random()->id,
        'amount' => random_int(1000, 3000),
    ];
});
