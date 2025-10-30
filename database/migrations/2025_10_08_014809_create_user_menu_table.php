<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserMenuTable extends Migration
{
    public function up()
    {
        Schema::create('user_menu', function (Blueprint $table) {
            $table->id();
            $table->string('menu',128);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_menu');
    }
}
