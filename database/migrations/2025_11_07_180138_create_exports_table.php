<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('exports', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('user_id')->nullable(); // ganti, tanpa foreign key
    $table->string('exporter');
    $table->unsignedInteger('total_rows')->nullable();
    $table->string('file_path')->nullable();
    $table->string('file_disk')->nullable()->default('local');
    $table->timestamp('completed_at')->nullable();
    $table->timestamps();
});
    }

    public function down(): void
    {
        Schema::dropIfExists('exports');
    }
};
