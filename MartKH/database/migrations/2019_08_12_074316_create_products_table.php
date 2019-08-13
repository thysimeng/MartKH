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
        if(!Schema::hasTable('subcategories')){
            Schema::create('products', function (Blueprint $table) {
                $table->increments('pid');
                $table->longText('image');
                $table->string('code',100);
                $table->string('name',100);
                $table->longText('description');
                $table->double('price',4,2);
                $table->string('size',20);
                $table->string('brand',50);
                $table->string('country',20);
                $table->integer('view');
                $table->timestamps();
                $table->unsignedInteger('subcategory_id');
                $table->unsignedInteger('stock_id');
                $table->foreign('subcategory_id')->references('sid')->on('subcategories');
                $table->foreign('stock_id')->references('stid')->on('stocks');
    
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
        Schema::dropIfExists('products');
    }
}
