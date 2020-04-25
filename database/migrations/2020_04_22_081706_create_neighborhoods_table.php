<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNeighborhoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('neighborhoods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('neighborhood');
            $table->timestamps();
        });


        Schema::table('users', function (Blueprint $table) {
            $table->biginteger('hood_id')->unsigned();
            $table->foreign('hood_id')->references('id')->on('neighborhoods')->onDelete('cascade');
        });

        Schema::table('stores', function (Blueprint $table) {
            $table->biginteger('store_hood_id')->unsigned();
            $table->foreign('store_hood_id')->references('id')->on('neighborhoods')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('neighborhoods');
    }
}
