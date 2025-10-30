<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSubMenuTable extends Migration
{
    public function up()
    {
        Schema::create('user_sub_menu', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_id')->nullable();
            $table->string('title',128)->nullable();
            $table->string('url',128)->nullable();
            $table->string('icon',128)->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->timestamps();

            $table->foreign('menu_id')->references('id')->on('user_menu')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_sub_menu');
    }
}
