<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ActivityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('activities')->insert([
            'activity_name' => 'Like',
            'type' => 0,
        ]);
        DB::table('activities')->insert([
            'activity_name' => 'Dislike',
            'type' => 0,
        ]);
        DB::table('activities')->insert([
            'activity_name' => 'Follow',
            'type' => 0,
        ]);
        DB::table('activities')->insert([
            'activity_name' => 'Unfollow',
            'type' => 0,
        ]);
        DB::table('activities')->insert([
            'activity_name' => 'Search',
            'type' => 0,
        ]);
    }
}
