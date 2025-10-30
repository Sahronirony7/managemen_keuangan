<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMpSubEntryTable extends Migration
{
    public function up()
    {
        Schema::create('mp_sub_entry', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable(); // relasi ke mp_generalentry
            $table->unsignedBigInteger('accounthead')->nullable(); // relasi ke mp_head
            $table->decimal('amount', 16, 2)->default(0);
            $table->tinyInteger('type')->default(0); // 0 = debit, 1 = credit (contoh)
            $table->unsignedBigInteger('journal_type')->nullable();
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('mp_generalentry')->onDelete('cascade');
            $table->foreign('accounthead')->references('id')->on('mp_head')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('mp_sub_entry');
    }
}
