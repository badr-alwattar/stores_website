<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('payment_order_id')->unsigned();
            $table->foreign('payment_order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->timestamps();
        });

        // Schema::table('orders', function (Blueprint $table) {
        //     $table->biginteger('order_payment_id')->unsigned()->nullable();
        //     $table->foreign('order_payment_id')->references('id')->on('payments')->onDelete('cascade');
        // });
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
}
