<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProductSubcategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function(Blueprint $table){
            $table->dropForeign('products_subcategory_id_foreign');
            $table->dropColumn('subcategory_id');
            $table->bigInteger('category_id');
            $table->foreign('category_id')->references('cid')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function(Blueprint $table){
            $table->bigInteger('subcategory_id');
            $table->foreign('subcategory_id')->references('sid')->on('subcategories');
            $table->dropIfExists('category_id');
            $table->dropForeign('products_category_id_foreign');
        });
    }
}
