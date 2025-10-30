<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMpAsetTable extends Migration
{
    public function up()
    {
        Schema::create('mp_aset', function (Blueprint $table) {
            $table->id();
            $table->string('nama_aset', 128);
            $table->date('tanggal_perolehan')->nullable();
            $table->string('jumlah_unit', 128)->nullable();
            $table->string('umur_manfaat', 128)->nullable();
            $table->string('harga_perolehan', 128)->nullable(); // bisa ganti decimal jika mau
            $table->string('akumulasi_penyusutan', 128)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mp_aset');
    }
}
