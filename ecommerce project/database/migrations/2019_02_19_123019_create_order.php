<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('product_id');
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');
            $table->dateTime('order_date');
            $table->string('name');
            $table->string('email');
            $table->string('address');
            $table->integer('postal_code');
            $table->string('phone');
            $table->integer('product_quantity');
            $table->boolean('status');
            $table->string('payment');
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
        Schema::dropIfExists('order');
    }
}
