<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'review_content' => $faker->text,
        'user_id' => $faker->numberBetween($min = 1, $max = 10),
        'book_id' => $faker->numberBetween($min = 94, $max = 100),
    ];
});

