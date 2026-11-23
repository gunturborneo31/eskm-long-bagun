<?php

use Database\Seeders\JenisLayananSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Kuesioner SKM baru (alur/survey.md): 12 pertanyaan, identitas responden tanpa data pribadi.
 *
 * Urutan kolom lama (9 unsur) -> kolom baru (12 pertanyaan):
 *   u1-u5 tetap, u6 Kompetensi -> u6 (6a), u7 Perilaku -> u8 (7a),
 *   u8 Sarana -> u11 (9a), u9 Pengaduan -> u10 (8).
 *   u7 (6b), u9 (7b) dan u12 (9b) kosong untuk data lama.
 */
return new class extends Migration
{
    private const TABEL = ['2024', '2023'];

    public function up(): void
    {
        Schema::create('jenis_layanan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->unsignedInteger('urutan')->default(0);
            $table->boolean('aktif')->default(true);
            $table->timestamps();
        });

        (new JenisLayananSeeder())->run();

        foreach (self::TABEL as $nama) {
            if (! Schema::hasTable($nama)) {
                continue;
            }

            if (DB::getDriverName() === 'mysql') {
                // Default lama '0000-00-00 00:00:00' ditolak MySQL strict mode saat ALTER TABLE.
                DB::statement("ALTER TABLE `$nama` MODIFY `updated_at` TIMESTAMP NULL DEFAULT NULL");
                // created_at lama memakai ON UPDATE CURRENT_TIMESTAMP: setiap UPDATE di bawah (dan saat
                // ganti nama jenis layanan) akan menimpa tanggal survei. Aturan itu harus dibuang dulu.
                DB::statement("ALTER TABLE `$nama` MODIFY `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP");
            }

            Schema::table($nama, function (Blueprint $table) use ($nama) {
                foreach (['u10', 'u11', 'u12'] as $u) {
                    if (! Schema::hasColumn($nama, $u)) {
                        $table->unsignedTinyInteger($u)->nullable();
                    }
                }
                if (! Schema::hasColumn($nama, 'tanggal_layanan')) {
                    $table->date('tanggal_layanan')->nullable();
                }
                if (! Schema::hasColumn($nama, 'disabilitas')) {
                    $table->string('disabilitas', 10)->nullable();
                }
                if (! Schema::hasColumn($nama, 'jenis_disabilitas')) {
                    $table->string('jenis_disabilitas', 50)->nullable();
                }
            });

            // Kolom lama dibuat boleh kosong: data pribadi tidak lagi ditanyakan,
            // dan pertanyaan 6b/7b tidak ada pada data lama.
            Schema::table($nama, function (Blueprint $table) use ($nama) {
                foreach (['u1', 'u2', 'u3', 'u4', 'u5', 'u6', 'u7', 'u8', 'u9'] as $u) {
                    $table->unsignedTinyInteger($u)->nullable()->change();
                }
                foreach (['nik', 'nama', 'nohp', 'jenisPelayanan', 'jenkel', 'pendidikan', 'pekerjaan'] as $kolom) {
                    if (Schema::hasColumn($nama, $kolom)) {
                        $table->string($kolom)->nullable()->change();
                    }
                }
                foreach (['alamat', 'saran'] as $kolom) {
                    if (Schema::hasColumn($nama, $kolom)) {
                        $table->text($kolom)->nullable()->change();
                    }
                }
                // usia sekarang berupa rentang ("17-25 tahun"), bukan angka
                $table->string('usia', 30)->nullable()->change();
            });

            DB::table($nama)->update(['u11' => DB::raw('u8'), 'u10' => DB::raw('u9')]);
            DB::table($nama)->update(['u8' => DB::raw('u7')]);
            DB::table($nama)->update(['u7' => null, 'u9' => null]);
        }
    }

    public function down(): void
    {
        foreach (self::TABEL as $nama) {
            if (! Schema::hasTable($nama) || ! Schema::hasColumn($nama, 'u12')) {
                continue;
            }

            DB::table($nama)->update(['u7' => DB::raw('u8')]);
            DB::table($nama)->update(['u8' => DB::raw('u11'), 'u9' => DB::raw('u10')]);

            Schema::table($nama, function (Blueprint $table) {
                $table->dropColumn(['u10', 'u11', 'u12', 'tanggal_layanan', 'disabilitas', 'jenis_disabilitas']);
            });
        }

        Schema::dropIfExists('jenis_layanan');
    }
};
