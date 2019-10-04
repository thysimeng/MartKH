<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_log', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('old_amount');
            $table->integer('new_amount');
            $table->unsignedBigInteger('product_id');
            $table->string('reason');
            $table->string('edited_by');
            $table->string('type');
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
        Schema::dropIfExists('stock_log');
    }
}
