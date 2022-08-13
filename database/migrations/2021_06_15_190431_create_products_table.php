<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('title')->nullable();
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->string('picture')->default('productdefault.png');
            $table->string('buyingprice')->nullable();
            $table->string('sellingprice')->nullable();
            $table->string('totalquantity')->nullable();
            $table->string('brand')->nullable();
            $table->string('fabric')->nullable();
            $table->string('description')->nullable();
            $table->string('catname')->nullable();
            $table->string('subcatname')->nullable();
            $table->integer('view_count')->default(0);
            $table->string('postby')->nullable();

            $table->softDeletes();
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
