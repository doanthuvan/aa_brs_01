<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\AuthorBook;
use Faker\Generator as Faker;

$factory->define(AuthorBook::class, function (Faker $faker) {
    return [
        'author_id' => $faker->numberBetween($min = 1, $max = 6),
        'book_id' => $faker->numberBetween($min = 1, $max = 100),
    ];
});
