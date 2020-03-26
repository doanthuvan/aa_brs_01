<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'title' => $faker->realText($maxNbChars = 100 , $indexSize = 1),
        'book_content' => $faker->paragraph($nbSentences = 5 , $variableNbSentences = true),
        'image' => $faker->imageUrl(300, 400, 'nature'),
        'price' => $faker->numberBetween($min = 10, $max = 20),
        'number_page' => $faker->numberBetween($min = 10, $max = 20),
        'view' => 0,
        'publisher_id' => $faker->numberBetween($min = 1, $max = 5),
        'category_id' => $faker->numberBetween($min = 1, $max = 5),
        'book_description' => $faker->realText($maxNbChars = 250 , $indexSize = 1),

    ];
});