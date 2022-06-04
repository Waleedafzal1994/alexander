<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class GeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('menus')->insert([
            'name' => 'Games',
            'created_at' => Carbon::now(),
        ]);
        DB::table('menus')->insert([
            'name' => 'Lifestyle',
            'created_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'name' => 'League of Legends',
            'menu_id' => 1,
            'created_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'name' => 'CS:GO',
            'menu_id' => 1,
            'created_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Minecraft',
            'menu_id' => 1,
            'created_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Apex Legends',
            'menu_id' => 1,
            'created_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Dota 2',
            'menu_id' => 1,
            'created_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Terraria',
            'menu_id' => 1,
            'created_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Advice',
            'menu_id' => 2,
            'created_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Chat',
            'menu_id' => 2,
            'created_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Emotional Support',
            'menu_id' => 2,
            'created_at' => Carbon::now(),
        ]);
    }
}
