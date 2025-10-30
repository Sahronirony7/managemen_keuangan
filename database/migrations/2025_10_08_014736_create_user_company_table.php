<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCompanyTable extends Migration
{
    public function up()
    {
        Schema::create('user_company', function (Blueprint $table) {
            $table->id();
            $table->string('name',128);
            $table->string('loc',128)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_company');
    }
}
