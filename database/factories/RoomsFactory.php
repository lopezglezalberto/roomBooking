<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Rooms;
use Faker\Generator as Faker;

$factory->define(Rooms::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'price_per_nigth' => $faker->randomDigitNotNull,
        'short_description' => $faker->word,
        'description' => $faker->text
    ];
});
