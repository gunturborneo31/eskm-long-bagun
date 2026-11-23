<?php

namespace Database\Seeders;

use App\Models\JenisLayanan;
use Illuminate\Database\Seeder;

/** Contoh pilihan Jenis Layanan. Aman dijalankan ulang: nama yang sudah ada tidak digandakan. */
class JenisLayananSeeder extends Seeder
{
    public const CONTOH = [
        'Pelayanan Administrasi Kependudukan',
        'Surat Keterangan / Rekomendasi',
        'Pelayanan Perizinan dan Non Perizinan (PATEN)',
        'Legalisasi Dokumen',
        'Pengaduan dan Konsultasi Masyarakat',
    ];

    public function run(): void
    {
        foreach (self::CONTOH as $i => $nama) {
            JenisLayanan::firstOrCreate(['nama' => $nama], ['urutan' => $i + 1, 'aktif' => true]);
        }
    }
}
