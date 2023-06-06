<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('date_of_payment');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('customer_id');
            $table->integer('amount_paid');
            $table->string('payment_number');
            $table->timestamps();


            $table->foreign('customer_id')
                ->references('id')->on('customers')->onDelete('cascade');

            $table->foreign('order_id')
                ->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
