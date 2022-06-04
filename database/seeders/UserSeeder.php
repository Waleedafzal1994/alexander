<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => 'test'.Str::random(1).'@gmail.com',
            'password' => Hash::make('password'),
            'points' => 0,
            'active' => 1,
            'banned' => 0,
            'user_group' => 0,
            'email_verified_at' => Carbon::now(),
            'created_at' => Carbon::now(),
        ]);
    }
}
