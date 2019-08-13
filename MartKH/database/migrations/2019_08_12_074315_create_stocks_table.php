<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        if(!Schema::hasTable('subcategories')){
            Schema::create('stocks', function (Blueprint $table) {
                $table->increments('stid');
                $table->integer('amount');
                $table->unsignedInteger('franchise_id');
                $table->foreign('franchise_id')->references('fid')->on('franchises');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
