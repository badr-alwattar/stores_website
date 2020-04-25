<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('name');
            $table->String('phone');
            $table->String('store_image');
            $table->longText('about_store');
            $table->biginteger('store_user_id')->unsigned();
            $table->foreign('store_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });


        Schema::table('users', function (Blueprint $table) {
            $table->biginteger('store_id')->unsigned()->nullable();
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
        });

       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores');
    }
}
