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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->string('delivered_by')->nullable();
            $table->string('date_of_order');
            $table->string('size_of_cylinder');
            $table->string('quantity');
            $table->integer('total_cost_of_order');
            $table->integer('cost_of_delivery');
            $table->integer('cost_of_gas');
            $table->string('date_of_delivery');
            $table->string('delivery_time_frame');
            $table->string('status_of_order')->default('Recieved');
            $table->string('delivery_location');
            $table->string('date_delivered')->nullable();
            $table->string('digital_location');
            $table->text('reason_for_cancellation')->nullable();
            $table->text('reason_for_non_delivery')->nullable();
            $table->timestamps();


            $table->foreign('customer_id')
                ->references('id')->on('customers')->onDelete('cascade');
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
};
