<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('pid');
            $table->longText('image');
            $table->string('code',100);
            $table->string('name',100);
            $table->longText('description');
            $table->double('price',4,2);
            $table->string('size',20);
            $table->string('brand',50);
            $table->string('country',20);
            $table->integer('subcategory_id');
            $table->integer('stock_id');
            $table->integer('view');
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
        Schema::dropIfExists('products');
    }
}
