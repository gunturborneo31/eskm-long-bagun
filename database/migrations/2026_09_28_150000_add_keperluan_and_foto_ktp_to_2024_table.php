<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Default lama '0000-00-00 00:00:00' ditolak MySQL strict mode saat ALTER TABLE.
        DB::statement('ALTER TABLE `2024` MODIFY `updated_at` TIMESTAMP NULL DEFAULT NULL');

        Schema::table('2024', function (Blueprint $table) {
            if (! Schema::hasColumn('2024', 'keperluan')) {
                $table->string('keperluan')->nullable()->after('alamat');
            }
            if (! Schema::hasColumn('2024', 'foto_ktp')) {
                $table->string('foto_ktp')->nullable()->after('keperluan');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('2024', function (Blueprint $table) {
            $table->dropColumn(['keperluan', 'foto_ktp']);
        });
    }
};
