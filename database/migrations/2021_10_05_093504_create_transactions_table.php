<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            // 0 - refill, 1 - purchase
            $table->integer('type');
            $table->integer('user_id');
            // GP amount
            $table->decimal('amount',13,2);
            $table->string('inc_dec')->nullable();
            $table->string('payment_method')->nullable();
            // 0 - unpaid, 1 - paid
            $table->string('payment_status')->nullable();
            $table->string('payment_price')->nullable();
            $table->string('order_id')->nullable();
            $table->datetime('payment_date')->nullable();
            $table->string('paypal_tx_id')->nullable();
            $table->string('stripe_tx_id')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
