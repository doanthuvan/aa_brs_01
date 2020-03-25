<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        db::table('categories')->insert([
            'category_name' => 'Giao Duc'
        ]);
        db::table('categories')->insert([
            'category_name' => 'Van Hoa'
        ]);
        db::table('categories')->insert([
            'category_name' => 'Thieu Nhi'
        ]);
        db::table('categories')->insert([
            'category_name' => 'Lich Su'
        ]);
        db::table('categories')->insert([
            'category_name' => 'Duong Dai'
        ]);
    }
}
