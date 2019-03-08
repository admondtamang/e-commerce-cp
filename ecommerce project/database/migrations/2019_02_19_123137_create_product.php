<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->integer('price');
            $table->string('image');
            $table->integer('stock_quantity');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');
            $table->integer('store_id');
            $table->foreign('store_id')->references('id')->on('store')->onDelete('cascade');
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
        Schema::dropIfExists('product');
    }
}
