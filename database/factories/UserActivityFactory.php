<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\UserActivity;
use Faker\Generator as Faker;

$factory->define(UserActivity::class, function (Faker $faker) {
    return [
        'user_id' => $faker -> numberBetween($min = 1, $max=10),
        'activity_id' => $faker -> numberBetween($max = 1, $max = 6),
        'type_id' => $faker -> numberBetween($min = 0, $max = 1),
    ];
});
