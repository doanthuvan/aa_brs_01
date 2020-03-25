<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'comment_content' => $faker->text,
        'number_like' => 0,
        'number_dislike' => 0,
        'user_id' => $faker->numberBetween($min = 1, $max = 10),
        'review_id' => $faker->numberBetween($min = 1, $max = 10),
    ];
});

