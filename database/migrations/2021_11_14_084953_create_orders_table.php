<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('tx_id')->nullable();
            $table->integer('buyer_id')->nullable();
            $table->integer('seller_id')->nullable();
            $table->integer('service_id')->nullable();
            $table->decimal('price',13,2);
            // 0 - Created (funds in escrow), 1 - Complete, 2 - Under Dispute, 3 - Dispute buyer won, 4 - Dispute seller won
            // 5 - cancelled
            $table->integer('status')->default(0);
            $table->integer('feedback_posted')->default(0);
            $table->integer('escrow')->default(1);
            $table->dateTime('escrow_release')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
