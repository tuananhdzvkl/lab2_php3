<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->id('product_id');
        $table->string('name', 20);
        $table->timestamps();
        $table->string('description', 500)->nullable();
        $table->float('price', 10, 2)->default(800.02);
    });
}

public function down()
{
    Schema::dropIfExists('products');
}

};
