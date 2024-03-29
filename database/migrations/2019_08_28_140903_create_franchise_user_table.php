<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFranchiseUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('franchise_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->BigInteger('franchise_id')->unsigned()->nullable();
            $table->BigInteger('user_id')->unsigned()->nullable();
            $table->foreign('franchise_id')->references('id')->on('franchises');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('franchise_user');
    }
}
