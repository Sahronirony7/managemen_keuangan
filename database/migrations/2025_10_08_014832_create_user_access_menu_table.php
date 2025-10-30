<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAccessMenuTable extends Migration
{
    public function up()
    {
        Schema::create('user_access_menu', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_id')->nullable();
            $table->unsignedBigInteger('menu_id')->nullable();
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('user_role')->onDelete('cascade');
            $table->foreign('menu_id')->references('id')->on('user_menu')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_access_menu');
    }
}
