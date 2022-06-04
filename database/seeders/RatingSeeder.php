<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ratings')->insert([
            'service_id' => 1,
            'order_id' => 0,
            'user_id' => 1,
            'rating' => 3,
            'anonymous' => 0,
            'anonymous_name' => "Testing Account",
            'review' => "Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. My first review.",
            'created_at' => Carbon::now(),
        ]);

        DB::table('ratings')->insert([
            'service_id' => 1,
            'order_id' => 0,
            'user_id' => 1,
            'rating' => 3,
            'anonymous' => 0,
            'anonymous_name' => "Testing Account Two",
            'review' => "Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. My second review.",
            'created_at' => Carbon::now(),
        ]);
    }
}
