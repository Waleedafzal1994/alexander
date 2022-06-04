<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('file_name')->nullable();
            $table->string('name')->nullable();
            $table->string('extension')->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->bigInteger('imageable_id')->unsigned()->nullable();
            $table->string('imageable_type')->nullable();
            $table->integer('type_id')
                ->default(0);
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
        Schema::dropIfExists('media_tbl');
    }
}
