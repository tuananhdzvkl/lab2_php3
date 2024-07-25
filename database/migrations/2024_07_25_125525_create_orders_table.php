<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->float('totalPrice', 10, 2);
    
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('orders');
    }
    
};
