<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Schema::hasTable('users')) { // Pastikan tabel users ada
            Schema::table('users', function (Blueprint $table) {
                if (!Schema::hasColumn('users', 'role')) { // Pastikan kolom role belum ada
                    $table->string('role')->default('user')->after('email'); // Tambahkan setelah email
                }
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('users')) {
            Schema::table('users', function (Blueprint $table) {
                if (Schema::hasColumn('users', 'role')) { // Hanya hapus jika ada
                    $table->dropColumn('role');
                }
            });
        }
    }
};
