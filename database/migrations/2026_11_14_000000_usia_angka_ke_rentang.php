<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Data lama menyimpan usia sebagai angka (mis. "29"), kuesioner baru memakai rentang
 * ("26-34 tahun"). Angka diubah ke rentangnya agar ikut terhitung di laporan dan filter.
 * Nilai yang bukan angka (sudah berupa rentang / kosong) tidak disentuh.
 */
return new class extends Migration
{
    private const TABEL = ['2024', '2023'];

    /** [batas atas usia (inklusif), label] */
    private const RENTANG = [
        [16, '< 17 tahun'],
        [25, '17-25 tahun'],
        [34, '26-34 tahun'],
        [44, '35-44 tahun'],
        [54, '45-54 tahun'],
        [65, '55-65 tahun'],
        [PHP_INT_MAX, '> 65 tahun'],
    ];

    public function up(): void
    {
        foreach (self::TABEL as $nama) {
            if (! Schema::hasTable($nama) || ! Schema::hasColumn($nama, 'usia')) {
                continue;
            }

            $angka = DB::table($nama)->whereNotNull('usia')->distinct()->pluck('usia')
                ->filter(fn ($u) => preg_match('/^\d{1,3}$/', trim((string) $u)));

            foreach ($angka as $usia) {
                $umur = (int) $usia;
                if ($umur <= 0) {
                    continue; // 0 berarti tidak diisi: biarkan sebagai data lama
                }
                $label = collect(self::RENTANG)->first(fn ($r) => $umur <= $r[0])[1];
                DB::table($nama)->where('usia', $usia)->update(['usia' => $label]);
            }
        }
    }

    public function down(): void
    {
        // Usia persis tidak bisa dikembalikan dari rentang; pulihkan dari backup bila perlu.
    }
};
