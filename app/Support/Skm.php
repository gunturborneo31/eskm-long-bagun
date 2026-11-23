<?php

namespace App\Support;

use App\Models\JenisLayanan;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Definisi kuesioner SKM (alur/survey.md) dan seluruh perhitungannya.
 * Semua halaman, export Excel dan laporan Word memakai kelas ini supaya hasilnya sama.
 */
class Skm
{
    /** Bobot tiap pertanyaan bila ke-12 pertanyaan terisi: 1/12. */
    public const JUMLAH_UNSUR = 12;

    public const JAWABAN = [
        1 => 'Sangat tidak setuju',
        2 => 'Tidak setuju',
        3 => 'Setuju',
        4 => 'Sangat setuju',
    ];

    public const TRIWULAN = [
        1 => 'Triwulan 1 (Jan, Feb, Mar)',
        2 => 'Triwulan 2 (Apr, Mei, Jun)',
        3 => 'Triwulan 2 (Jan s/d Jun)',
        4 => 'Triwulan 3 (Jul, Agu, Sep)',
        5 => 'Triwulan 3 (Jan s/d Sep)',
        6 => 'Triwulan 4 (Okt, Nop, Des)',
        7 => 'Triwulan 4 (Jan s/d Des)',
    ];

    /** tw => [bulan awal, bulan akhir] */
    private const RENTANG_TW = [
        1 => [1, 3],
        2 => [4, 6],
        3 => [1, 6],
        4 => [7, 9],
        5 => [1, 9],
        6 => [10, 12],
        7 => [1, 12],
    ];

    public const NAMA_BULAN = [
        1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember',
    ];

    /**
     * Kolom u1..u12 berurutan sesuai nomor pertanyaan pada survey.md.
     * Data lama (9 unsur) sudah dipindah ke kolom yang maknanya sama oleh migrasi.
     */
    public static function unsur(): array
    {
        return [
            'u1' => ['kode' => '1', 'unsur' => 'Persyaratan', 'pertanyaan' => 'Persyaratan layanan diinformasikan dengan jelas dan mudah dipahami'],
            'u2' => ['kode' => '2', 'unsur' => 'Prosedur', 'pertanyaan' => 'Prosedur/Alur layanan mudah dipahami dan dilakukan'],
            'u3' => ['kode' => '3', 'unsur' => 'Waktu Pelayanan', 'pertanyaan' => 'Layanan yang diberikan sudah tepat waktu'],
            'u4' => ['kode' => '4', 'unsur' => 'Biaya/Tarif', 'pertanyaan' => 'Rincian biaya/tarif layanan disampaikan secara jelas dan mudah dipahami'],
            'u5' => ['kode' => '5', 'unsur' => 'Produk Layanan', 'pertanyaan' => 'Kualitas produk layanan yang diterima memuaskan'],
            'u6' => ['kode' => '6a', 'unsur' => 'Kompetensi Pelaksana (Petugas)', 'pertanyaan' => 'Petugas merespon kebutuhan dengan cepat'],
            'u7' => ['kode' => '6b', 'unsur' => 'Kompetensi Pelaksana (Aplikasi)', 'pertanyaan' => 'Aplikasi sistem pelayanan merespon kebutuhan dengan cepat (membuka halaman, konten, pencarian informasi, unduh/unggah)'],
            'u8' => ['kode' => '7a', 'unsur' => 'Perilaku Pelaksana (Petugas)', 'pertanyaan' => 'Petugas melayani saya dengan ramah'],
            'u9' => ['kode' => '7b', 'unsur' => 'Perilaku Pelaksana (Aplikasi)', 'pertanyaan' => 'Fitur pada aplikasi sistem layanan mudah digunakan'],
            'u10' => ['kode' => '8', 'unsur' => 'Penanganan Pengaduan, Saran dan Masukan', 'pertanyaan' => 'Layanan konsultasi dan pengaduan mudah diakses'],
            'u11' => ['kode' => '9a', 'unsur' => 'Sarana dan Prasarana', 'pertanyaan' => 'Sarana prasarana nyaman dan mudah digunakan'],
            'u12' => ['kode' => '9b', 'unsur' => 'Sarana dan Prasarana (Sistem Online)', 'pertanyaan' => 'Sistem layanan online berfungsi dengan baik tanpa mengalami kendala'],
        ];
    }

    /**
     * Pertanyaan identitas responden. 'opsi' => [label tersimpan => alias nilai lama].
     * Nilai lama yang tidak punya padanan dihitung sebagai "Data lama / tidak diisi".
     */
    public static function profil(): array
    {
        return [
            'jenisPelayanan' => [
                'judul' => 'Jenis Layanan',
                'opsi' => array_fill_keys(self::jenisLayanan(), []),
            ],
            'jenkel' => [
                'judul' => 'Jenis Kelamin',
                'opsi' => ['Laki-laki' => ['Laki - Laki'], 'Perempuan' => []],
            ],
            'pendidikan' => [
                'judul' => 'Pendidikan',
                'opsi' => [
                    'Tidak sekolah' => [],
                    'SD/Sederajat' => ['SD'],
                    'SMP/Sederajat' => ['SMP'],
                    'SMA/Sederajat' => ['SMA / SMK'],
                    'D1/D2/D3' => ['D-I / D-III'],
                    'D4/S1' => ['S1 / Setara'],
                    'S2' => [],
                    'S3' => [],
                ],
            ],
            'usia' => [
                'judul' => 'Usia',
                'opsi' => [
                    '< 17 tahun' => [],
                    '17-25 tahun' => [],
                    '26-34 tahun' => [],
                    '35-44 tahun' => [],
                    '45-54 tahun' => [],
                    '55-65 tahun' => [],
                    '> 65 tahun' => [],
                ],
            ],
            'pekerjaan' => [
                'judul' => 'Pekerjaan',
                'opsi' => [
                    'ASN' => [],
                    'TNI' => [],
                    'POLRI' => [],
                    'Swasta' => [],
                    'Wirausaha' => ['Pengusaha'],
                    'Ibu Rumah Tangga' => [],
                    'Pelajar/Mahasiswa' => ['Pelajar'],
                    'Petani/Nelayan' => [],
                    'Pekerja Lepas/Freelance' => [],
                    'Pensiunan' => [],
                    'Lainnya' => [],
                ],
            ],
            'disabilitas' => [
                'judul' => 'Penyandang / Pendamping Disabilitas',
                'opsi' => ['Ya' => [], 'Tidak' => []],
            ],
            'jenis_disabilitas' => [
                'judul' => 'Jenis Disabilitas',
                'opsi' => [
                    'Disabilitas Fisik' => [],
                    'Disabilitas Intelektual' => [],
                    'Disabilitas Mental' => [],
                    'Disabilitas Sensorik' => [],
                ],
                // hanya ditanyakan bila disabilitas = Ya, jadi kosong bukan "data lama"
                'abaikan_kosong' => true,
            ],
        ];
    }

    public static function opsi(string $field): array
    {
        return array_keys(self::profil()[$field]['opsi']);
    }

    public static function jenisLayanan(bool $semua = false): array
    {
        if (! Schema::hasTable('jenis_layanan')) {
            return [];
        }

        return JenisLayanan::query()
            ->when(! $semua, fn ($q) => $q->where('aktif', true))
            ->orderBy('urutan')
            ->orderBy('nama')
            ->pluck('nama')
            ->all();
    }

    // ---------------------------------------------------------------- periode & filter

    public static function tahun(Request $request): int
    {
        $tahun = (int) $request->input('Tahun');

        return $tahun >= 2000 && $tahun <= 2100 ? $tahun : (int) date('Y');
    }

    /** Triwulan berjalan: dipakai sebagai default filter. */
    public static function twSekarang(): int
    {
        $bulan = (int) date('n');

        return $bulan <= 3 ? 1 : ($bulan <= 6 ? 3 : ($bulan <= 9 ? 5 : 7));
    }

    public static function tw(Request $request): int
    {
        $tw = (int) $request->input('tw');

        return isset(self::RENTANG_TW[$tw]) ? $tw : 7;
    }

    /** [tanggal awal 00:00:00, tanggal akhir 23:59:59] */
    public static function periode(int $tw, int $tahun): array
    {
        [$awal, $akhir] = self::RENTANG_TW[$tw] ?? [1, 12];

        return [
            sprintf('%04d-%02d-01 00:00:00', $tahun, $awal),
            date('Y-m-t 23:59:59', mktime(0, 0, 0, $akhir, 1, $tahun)),
        ];
    }

    /** ['bulanAwal', 'bulanAkhir', 'semester'] untuk laporan. */
    public static function keteranganPeriode(int $tw): array
    {
        [$awal, $akhir] = self::RENTANG_TW[$tw] ?? [1, 12];

        return [
            'bulanAwal' => self::NAMA_BULAN[$awal],
            'bulanAkhir' => self::NAMA_BULAN[$akhir],
            'semester' => $akhir <= 6 ? '1' : '2',
        ];
    }

    public static function tabel(int $tahun): string
    {
        return $tahun == 2023 && Schema::hasTable('2023') ? '2023' : '2024';
    }

    /** Filter profil aktif dari ?filter[field]=label */
    public static function filter(Request $request): array
    {
        $profil = self::profil();

        return collect((array) $request->input('filter', []))
            ->filter(fn ($nilai, $field) => isset($profil[$field]) && $nilai !== null && $nilai !== '')
            ->map(fn ($nilai) => (string) $nilai)
            ->all();
    }

    /** Query responden sesuai Tahun, tw dan filter pada request. */
    public static function query(Request $request): Builder
    {
        $tahun = self::tahun($request);
        [$awal, $akhir] = self::periode(self::tw($request), $tahun);

        return self::bangunQuery($tahun, $awal, $akhir, self::filter($request));
    }

    private static function bangunQuery(int $tahun, string $awal, string $akhir, array $filter): Builder
    {
        $query = DB::table(self::tabel($tahun))->whereBetween('created_at', [$awal, $akhir]);

        $profil = self::profil();
        foreach ($filter as $field => $label) {
            $query->whereIn($field, array_merge([$label], $profil[$field]['opsi'][$label] ?? []));
        }

        return $query;
    }

    /** Parameter query string periode + filter, untuk link export dan pagination. */
    public static function queryString(Request $request, array $tambahan = []): string
    {
        return http_build_query(array_merge([
            'tw' => self::tw($request),
            'Tahun' => self::tahun($request),
            'filter' => self::filter($request),
        ], $tambahan));
    }

    // ---------------------------------------------------------------- perhitungan

    /**
     * NRR per unsur = jumlah nilai / jumlah responden yang menjawab unsur itu.
     * NRR tertimbang = NRR x bobot (1/12). IKM = jumlah NRR tertimbang x 25.
     * Bila ada pertanyaan yang belum pernah dijawab (periode data lama), bobot dibagi
     * rata ke pertanyaan yang ada jawabannya agar IKM tidak turun karena kolom kosong.
     */
    public static function hitung(Builder $query): array
    {
        $kolom = array_keys(self::unsur());

        $select = ['COUNT(*) AS n'];
        foreach ($kolom as $k) {
            $select[] = "SUM($k) AS t_$k";
            $select[] = "COUNT($k) AS c_$k";
        }
        $agregat = (clone $query)->reorder()->selectRaw(implode(', ', $select))->first();

        $terisi = collect($kolom)->filter(fn ($k) => $agregat->{"c_$k"} > 0)->count();
        $bobot = $terisi > 0 ? 1 / $terisi : 1 / self::JUMLAH_UNSUR;

        $unsur = [];
        $totalNilai = 0;
        $jumlahNrr = 0;
        $nrrT = 0;
        foreach (self::unsur() as $k => $def) {
            $total = (int) $agregat->{"t_$k"};
            $jumlah = (int) $agregat->{"c_$k"};
            $nrr = $jumlah > 0 ? $total / $jumlah : 0;
            $nrrt = $jumlah > 0 ? $nrr * $bobot : 0;

            $unsur[$k] = $def + [
                'total' => $total,
                'responden' => $jumlah,
                'nrr' => $nrr,
                'nrrt' => $nrrt,
                'mutu' => $jumlah > 0 ? self::mutuNrr($nrr) : '-',
            ];
            $totalNilai += $total;
            $jumlahNrr += $nrr;
            $nrrT += $nrrt;
        }

        $n = (int) $agregat->n;
        $ikm = $n > 0 ? $nrrT * 25 : 0;
        [$mutu, $kinerja] = self::mutuIkm($ikm, $n > 0);

        return [
            'n' => $n,
            'bobot' => $bobot,
            'unsur' => $unsur,
            'totalNilai' => $totalNilai,
            'nrr' => $jumlahNrr,
            'nrrT' => $nrrT,
            'ikm' => $ikm,
            'mutu' => $mutu,
            'kinerja' => $kinerja,
        ];
    }

    /** Nilai SKM satu responden: rata-rata jawaban x 25. */
    public static function nilaiResponden(object $baris): ?float
    {
        $nilai = collect(array_keys(self::unsur()))
            ->map(fn ($k) => $baris->$k ?? null)
            ->filter(fn ($v) => $v !== null && $v !== '');

        return $nilai->isEmpty() ? null : $nilai->avg() * 25;
    }

    /** Mutu per unsur dari NRR (skala 1-4), Permen PAN-RB No. 14/2017. */
    public static function mutuNrr(float $nrr): string
    {
        if ($nrr < 2.60) {
            return 'D';
        }
        if ($nrr < 3.0644) {
            return 'C';
        }
        if ($nrr < 3.5324) {
            return 'B';
        }

        return 'A';
    }

    /** [mutu, kinerja] dari nilai IKM konversi (25-100). */
    public static function mutuIkm(float $ikm, bool $adaData = true): array
    {
        if (! $adaData) {
            return ['-', '-'];
        }
        if ($ikm < 65) {
            return ['D', 'TIDAK MEMUASKAN'];
        }
        if ($ikm < 76.61) {
            return ['C', 'KURANG MEMUASKAN'];
        }
        if ($ikm < 88.31) {
            return ['B', 'MEMUASKAN'];
        }

        return ['A', 'SANGAT MEMUASKAN'];
    }

    /** Tabel konversi untuk ditampilkan di halaman. */
    public static function tabelKonversi(): array
    {
        return [
            ['persepsi' => 1, 'interval' => '1,00 - 2,5996', 'konversi' => '25,00 - 64,99', 'mutu' => 'D', 'kinerja' => 'Tidak Memuaskan'],
            ['persepsi' => 2, 'interval' => '2,60 - 3,064', 'konversi' => '65,00 - 76,60', 'mutu' => 'C', 'kinerja' => 'Kurang Memuaskan'],
            ['persepsi' => 3, 'interval' => '3,0644 - 3,532', 'konversi' => '76,61 - 88,30', 'mutu' => 'B', 'kinerja' => 'Memuaskan'],
            ['persepsi' => 4, 'interval' => '3,5324 - 4,00', 'konversi' => '88,31 - 100,00', 'mutu' => 'A', 'kinerja' => 'Sangat Memuaskan'],
        ];
    }

    /**
     * Jumlah responden per pilihan untuk satu pertanyaan identitas.
     * Mengembalikan [['label', 'jumlah', 'persen'], ...].
     */
    public static function rekapProfil(Builder $query, string $field): array
    {
        $def = self::profil()[$field];
        $mentah = (clone $query)->reorder()
            ->selectRaw("$field AS nilai, COUNT(*) AS jumlah")
            ->groupBy($field)
            ->pluck('jumlah', 'nilai');

        $hasil = [];
        $terhitung = [];
        foreach ($def['opsi'] as $label => $alias) {
            $jumlah = 0;
            foreach (array_merge([$label], $alias) as $nilai) {
                $jumlah += (int) ($mentah[$nilai] ?? 0);
                $terhitung[] = (string) $nilai;
            }
            $hasil[] = ['label' => $label, 'jumlah' => $jumlah];
        }

        $lainnya = 0;
        foreach ($mentah as $nilai => $jumlah) {
            $kosong = $nilai === null || $nilai === '';
            if (in_array((string) $nilai, $terhitung, true) || ($kosong && ! empty($def['abaikan_kosong']))) {
                continue;
            }
            $lainnya += (int) $jumlah;
        }
        if ($lainnya > 0) {
            $hasil[] = ['label' => 'Data lama / tidak diisi', 'jumlah' => $lainnya];
        }

        $total = array_sum(array_column($hasil, 'jumlah'));
        foreach ($hasil as &$baris) {
            $baris['persen'] = $total > 0 ? $baris['jumlah'] / $total * 100 : 0;
        }

        return $hasil;
    }

    /** Pilihan dengan jumlah terbanyak (untuk kesimpulan laporan). */
    public static function terbanyak(array $rekap): string
    {
        $baris = collect($rekap)->where('label', '!=', 'Data lama / tidak diisi')->sortByDesc('jumlah')->first();

        return $baris && $baris['jumlah'] > 0 ? $baris['label'] : '-';
    }

    /** IKM kumulatif dari awal periode sampai akhir tiap bulan pada tahun terpilih. */
    public static function trenBulanan(Request $request): array
    {
        $tahun = self::tahun($request);
        [$awal] = self::periode(self::tw($request), $tahun);

        $filter = self::filter($request);

        $hasil = [];
        for ($bulan = 1; $bulan <= 12; $bulan++) {
            $akhir = date('Y-m-t 23:59:59', mktime(0, 0, 0, $bulan, 1, $tahun));
            $hasil[] = $akhir < $awal ? 0 : round(self::hitung(self::bangunQuery($tahun, $awal, $akhir, $filter))['ikm'], 2);
        }

        return $hasil;
    }

    public static function angka(float $nilai, int $desimal = 3): string
    {
        return number_format($nilai, $desimal, ',', '.');
    }
}
