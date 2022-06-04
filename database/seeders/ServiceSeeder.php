<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('services')->insert([
            'user_id' => 1,
            'name' => 'Testing Service',
            'category_id' => 1,
            'active' => 1,
            'price' => 5.50,
            'monday_from' => '00:00:00',
            'tuesday_from' => '00:00:00',
            'wednesday_from' => '00:00:00',
            'thursday_from' => '00:00:00',
            'friday_from' => '00:00:00',
            'saturday_from' => '00:00:00',
            'sunday_from' => '00:00:00',
            'monday_to' => '23:59:59',
            'tuesday_to' => '23:59:59',
            'wednesday_to' => '23:59:59',
            'thursday_to' => '23:59:59',
            'friday_to' => '23:59:59',
            'saturday_to' => '23:59:59',
            'sunday_to' => '23:59:59',
            'description' => 'This is a test.',
            'created_at' => Carbon::now(),
        ]);
       
        DB::table('services')->insert([
            'user_id' => 1,
            'category_id' => 2,
            'active' => 1,
            'price' => 5.50,
            'monday_from' => '00:00:00',
            'tuesday_from' => '00:00:00',
            'wednesday_from' => '00:00:00',
            'thursday_from' => '00:00:00',
            'friday_from' => '00:00:00',
            'saturday_from' => '00:00:00',
            'sunday_from' => '00:00:00',
            'monday_to' => '23:59:59',
            'tuesday_to' => '23:59:59',
            'wednesday_to' => '23:59:59',
            'thursday_to' => '23:59:59',
            'friday_to' => '23:59:59',
            'saturday_to' => '23:59:59',
            'sunday_to' => '23:59:59',
            'description' => 'This is a test 2.',
            'created_at' => Carbon::now(),
        ]);
       
    }
}
