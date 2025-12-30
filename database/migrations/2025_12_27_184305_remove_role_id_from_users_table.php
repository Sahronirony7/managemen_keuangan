<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            // DROP FK hanya jika ADA
            if (Schema::hasColumn('users', 'role_id')) {

                // Coba drop foreign key kalau ada
                try {
                    $table->dropForeign(['role_id']);
                } catch (\Throwable $e) {
                    // abaikan jika foreign key tidak ada
                }

                // Drop kolom role_id
                $table->dropColumn('role_id');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (! Schema::hasColumn('users', 'role_id')) {
                $table->unsignedBigInteger('role_id')->nullable();
            }
        });
    }
};
