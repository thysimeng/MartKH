<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteSubcategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('subcategories');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('subcategories', function (Blueprint $table) {
            $table->bigIncrements('sid');
            $table->integer('category_id');
            $table->string('subcategory_name',20);
            $table->timestamps();
            $table->unique('subcategory_name');
            $table->unsignedBigInteger('category_id')->change();
            $table->foreign('category_id')->references('cid')->on('categories');
        });
    }
}
