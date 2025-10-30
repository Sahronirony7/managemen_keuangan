<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMpHutangTable extends Migration
{
    public function up()
    {
        Schema::create('mp_hutang', function (Blueprint $table) {
            $table->id();
            $table->string('nama_hutang', 128);
            $table->date('tanggal_hutang')->nullable();
            $table->string('penambahan', 128)->nullable();
            $table->string('pengurangan', 128)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mp_hutang');
    }
}
