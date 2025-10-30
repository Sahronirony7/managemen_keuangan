<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMpHeadTable extends Migration
{
    public function up()
    {
        Schema::create('mp_head', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('nature', 50)->nullable();
            $table->string('type', 50)->nullable();
            $table->string('expense_type', 50)->nullable();
            $table->string('revenue_type', 128)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mp_head');
    }
}
