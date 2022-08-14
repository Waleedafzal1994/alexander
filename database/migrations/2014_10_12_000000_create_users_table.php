<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('User');
            $table->string('real_name')->default('New User');
            $table->string('email')->unique()->nullable();
            $table->string('country')->default('N/A');
            $table->string('gender')->nullable();
            $table->string('user_title')->default('GamersPlay User');
            $table->date('birth_date')->nullable();
            $table->text('description')->nullable();
            $table->string('primary_language')->default('English');
            $table->string('secondary_language')->nullable();
            $table->decimal('points',13,2)->default(0);
            $table->decimal('earned_gp',13,2)->default(0);
            $table->integer('active')->default(1);
            $table->integer('banned')->default(0);
            $table->string('discord_id')->nullable();
            $table->string('google_id')->nullable();
            $table->string('twitch_id')->nullable();
            $table->string('facebook_id')->nullable();
            $table->string('apple_id')->nullable();
            $table->string('instagram_profile')->nullable();
            $table->string('twitch_profile')->nullable();
            $table->string('facebook_profile')->nullable();
            $table->string('discord_handle')->nullable();
            $table->string('profile_picture')->nullable();
            $table->integer('user_group')->default(0); // User, EMPTY, Moderator, Administrator
            $table->integer('user_subscription_rank')->default(0); // Standard, Premium, Premium+
            $table->integer('seller_rank')->default(0); // None, Seller, Seller+, Seller++
            $table->string('seller_audio_link')->nullable();
            $table->integer('seller_vacation_mode')->default(0);
            $table->timestamp('seller_rank_update')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('last_seen')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
