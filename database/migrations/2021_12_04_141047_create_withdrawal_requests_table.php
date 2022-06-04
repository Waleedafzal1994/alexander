<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawalRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdrawal_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            // 0 - pending, 1 - denied, 2 - accepted
            $table->integer('status')->default(0);
            $table->decimal('amount',13,2);
            $table->integer('staff_id');
            // 0 - paypal, 1 - bank withdrawal
            $table->integer('payment_method');
            $table->text('bank_iban')->nullable();
            $table->text('bank_name')->nullable();
            $table->text('bank_swift')->nullable();
            $table->text('bank_recipient')->nullable();
            $table->text('bank_recipient_address')->nullable();
            $table->text('note')->nullable();
            $table->string('paypal_email')->nullable();
            $table->timestamp('paid_at')->nullable();
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
        Schema::dropIfExists('withdrawal_requests');
    }
}
