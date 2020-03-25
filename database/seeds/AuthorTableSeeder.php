<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AuthorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('authors')->insert([
            'author_name' => 'Nguyen Van A,',
        ]);

        DB::table('authors')->insert([
            'author_name' => 'Tran Van B,',
        ]);

        DB::table('authors')->insert([
            'author_name' => 'Pham Thi C,',
        ]);

        DB::table('authors')->insert([
            'author_name' => 'Bui Van D,',
        ]);

        DB::table('authors')->insert([
            'author_name' => 'Le Thi E,',
        ]);

        DB::table('authors')->insert([
            'author_name' => 'Hoang Van H,',
        ]);
    }
}
