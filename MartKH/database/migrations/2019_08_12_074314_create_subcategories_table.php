<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        if(!Schema::hasTable('subcategories')){
            Schema::create('subcategories', function (Blueprint $table) {
                $table->increments('sid');
                $table->string('subcategory_name',20);
                $table->unsignedInteger('category_id');
                $table->foreign('category_id')->references('cid')->on('categories');
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
        Schema::dropIfExists('subcategories');
    }
}
