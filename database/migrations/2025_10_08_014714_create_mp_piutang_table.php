<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMpPiutangTable extends Migration
{
    public function up()
    {
        Schema::create('mp_piutang', function (Blueprint $table) {
            $table->id();
            $table->string('nama_piutang', 128);
            $table->date('tanggal_piutang')->nullable();
            $table->string('penambahan', 128)->nullable();
            $table->string('pengurangan', 128)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mp_piutang');
    }
}
