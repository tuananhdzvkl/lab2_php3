<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('users', function (Blueprint $table) {
        $table->id('user_id');
        $table->string('name', 100); // Tăng độ dài cột name lên 100 ký tự
        $table->string('email', 255)->unique();
        $table->timestamp('email_verified_at')->nullable();
        $table->string('password');
        $table->string('address')->nullable();
        $table->string('phone')->nullable();
        $table->rememberToken();
        $table->timestamps();
    });
    
}

public function down()
{
    Schema::dropIfExists('users');
}

};
