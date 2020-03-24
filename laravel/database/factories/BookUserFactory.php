<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BookUser;
use Faker\Generator as Faker;

$factory->define(BookUser::class, function (Faker $faker) {
    return [
        'book_id' => $faker->numberBetween($min = 1, $max = 10),
        'user_id' => $faker->numberBetween($min = 1, $max = 10),
        'favorite' => 0,
    ];
});