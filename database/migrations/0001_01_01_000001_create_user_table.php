<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',128)->nullable();
            $table->string('email',128)->unique()->nullable();
            $table->string('image',128)->nullable();
            $table->string('password',256);
            $table->unsignedBigInteger('role_id')->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->timestamp('date_created')->nullable();
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('user_role')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user');
    }
}
