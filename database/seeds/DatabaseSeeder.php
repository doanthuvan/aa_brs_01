<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            //UserTableSeeder::class,
            BookTableSeeder::class,
            // AuthorTableSeeder::class,
            // AuthorBookTableSeeder::class,
            // BookUserTableSeeder::class,
            // RateTableSeeder::class,
            // UserActivityTableSeeder::class,
            // ReviewTableSeeder::class,
            // PublisherTableSeeder::class,
            // CommentTableSeeder::class,
            // ActivityTableSeeder::class,
            // CategoryTableSeeder::class,
            // RequestNewBookTableSeeder::class,
        ]);
    }
}
