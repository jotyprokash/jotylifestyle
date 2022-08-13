<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shippingid')->nullable();
            $table->unsignedBigInteger('paymentid')->nullable();
            $table->unsignedBigInteger('productid')->nullable();
            $table->string('producttitle')->nullable();
            $table->string('quantity')->nullable();
            $table->string('productprice')->nullable(); 
            $table->string('color')->nullable(); 
            $table->string('size')->nullable(); 
            $table->string('total')->nullable();
            $table->string('picture')->nullable();
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
        Schema::dropIfExists('order_products');
    }
}
