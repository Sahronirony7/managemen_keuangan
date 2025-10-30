<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMpGeneralentryTable extends Migration
{
    public function up()
    {
        Schema::create('mp_generalentry', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('naration', 255)->nullable();
            $table->string('generated_source', 50)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mp_generalentry');
    }
}
