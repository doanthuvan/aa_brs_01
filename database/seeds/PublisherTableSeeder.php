<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublisherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('publishers')->insert([
            'publisher_name' => 'Kim Dong',
        ]);

        DB::table('publishers')->insert([
            'publisher_name' => 'Giao Duc',
        ]);

        DB::table('publishers')->insert([
            'publisher_name' => 'Ha Noi',
        ]);

        DB::table('publishers')->insert([
            'publisher_name' => 'TPHCM',
        ]);

        DB::table('publishers')->insert([
            'publisher_name' => 'Van Hoa',
        ]);
    }
}
