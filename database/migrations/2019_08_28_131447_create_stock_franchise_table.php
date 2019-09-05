<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockFranchiseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_franchise', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('amount');
            $table->BigInteger('product_id')->unsigned()->nullable();
            $table->BigInteger('franchise_id')->unsigned()->nullable();
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('franchise_id')->references('id')->on('franchises');
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
        Schema::dropIfExists('stock_franchise');
    }
}
