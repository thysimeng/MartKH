<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('view')->nullable()->change();
            $table->string('brand', 50)->nullable()->change();
            $table->string('country', 20)->nullable()->change();
            $table->unsignedBigInteger('subcategory_id')->change();
            $table->unique('code');
            $table->unique('name');
            $table->dropColumn('stock_id');
            $table->foreign('subcategory_id')->references('sid')->on('subcategories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_subcategory_id_foreign');
            $table->dropUnique('code');
            $table->dropUnique('name');
            $table->integer('stock_id');
        });

    }
}
