<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Booking;
use Faker\Generator as Faker;

$factory->define(Booking::class, function (Faker $faker) {

    return [
        'arrival_date' => $faker->date('Y-m-d H:i:s'),
        'departure_date' => $faker->date('Y-m-d H:i:s'),
        'rooms_id' => $faker->randomDigitNotNull,
        'full_name' => $faker->word,
        'email' => $faker->word,
        'phone' => $faker->word,
        'note' => $faker->text
    ];
});
