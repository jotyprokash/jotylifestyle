<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('invoice')->nullable();
            $table->unsignedBigInteger('shippingid')->nullable();
            $table->string('userid')->nullable();
            $table->string('username')->nullable();           
            $table->string('address')->nullable();
            $table->string('phonenumber')->nullable();
            $table->string('email')->nullable();
            $table->string('status')->default('Pending');
            $table->unsignedBigInteger('paymentid')->nullable();
            $table->string('senderphonenumber')->nullable();
            $table->string('trxid')->nullable();
            $table->string('paymentmethod');
            $table->string('totalamount')->nullable();
            $table->string('paymentamount')->default(0);
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
        Schema::dropIfExists('orders');
    }
}
