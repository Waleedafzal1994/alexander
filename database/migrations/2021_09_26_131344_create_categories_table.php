<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('menu_id')->required();
            $table->string('image_1')->nullable();
            $table->string('image_2')->nullable();
            $table->string('image_3')->nullable();
            $table->integer('popular')->default(0);
            $table->string('udf1_name')->nullable();
            $table->json('udf1_values')->nullable();
            $table->string('udf2_name')->nullable();
            $table->json('udf2_values')->nullable();
            $table->string('udf3_name')->nullable();
            $table->json('udf3_values')->nullable();
            $table->text('description')->nullable();
            $table->integer('visible')->default(1);
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
        Schema::dropIfExists('categories');
    }
}
