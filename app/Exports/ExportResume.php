<?php

namespace App\Exports;

use App\Support\Skm;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

/** Data responden + rekap NRR/IKM sesuai periode dan filter halaman admin. */
class ExportResume implements FromArray, WithHeadings, WithCustomStartCell, ShouldAutoSize, WithStyles
{
    private const IDENTITAS = [
        'jenisPelayanan' => 'JENIS LAYANAN',
        'tanggal_layanan' => 'TANGGAL MENERIMA LAYANAN',
        'jenkel' => 'JENIS KELAMIN',
        'usia' => 'USIA',
        'pendidikan' => 'PENDIDIKAN',
        'pekerjaan' => 'PEKERJAAN',
        'disabilitas' => 'DISABILITAS',
        'jenis_disabilitas' => 'JENIS DISABILITAS',
    ];

    private int $jumlahBaris = 0;

    public function headings(): array
    {
        $judul = array_merge(['NO', 'TANGGAL SURVEI'], array_values(self::IDENTITAS));
        foreach (Skm::unsur() as $u) {
            $judul[] = 'U' . $u['kode'];
        }

        return array_merge($judul, ['NILAI SKM', 'SARAN']);
    }

    public function array(): array
    {
        $request = request();
        $query = Skm::query($request);
        $kolomUnsur = array_keys(Skm::unsur());

        $baris = [];
        foreach ((clone $query)->orderBy('created_at')->get() as $i => $data) {
            $isi = [$i + 1, date('d-m-Y H:i', strtotime($data->created_at))];
            foreach (array_keys(self::IDENTITAS) as $field) {
                $isi[] = $data->$field ?? '';
            }
            foreach ($kolomUnsur as $k) {
                $isi[] = $data->$k;
            }
            $nilai = Skm::nilaiResponden($data);
            $isi[] = $nilai === null ? '' : round($nilai, 2);
            $isi[] = $data->saran ?? '';
            $baris[] = $isi;
        }

        $hasil = Skm::hitung($query);
        $kosong = array_fill(0, count(self::IDENTITAS) + 1, '');
        $rekap = [
            'TOTAL NILAI UNSUR' => fn ($u) => $u['total'],
            'NRR PER UNSUR' => fn ($u) => round($u['nrr'], 3),
            'NRR TERTIMBANG' => fn ($u) => round($u['nrrt'], 3),
        ];

        $baris[] = [];
        foreach ($rekap as $label => $nilai) {
            $baris[] = array_merge([$label], $kosong, array_map($nilai, array_values($hasil['unsur'])));
        }
        $baris[] = array_merge(['NILAI SKM (NRR TERTIMBANG x 25)'], $kosong, [round($hasil['ikm'], 2)]);
        $baris[] = array_merge(['MUTU / KINERJA'], $kosong, [$hasil['mutu'] . ' / ' . $hasil['kinerja']]);

        $this->jumlahBaris = count($baris);

        return $baris;
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('2')->getFont()->setBold(true);

        $akhir = $this->jumlahBaris + 2;
        for ($r = $akhir - 4; $r <= $akhir; $r++) {
            $sheet->getStyle('B' . $r)->getFont()->setBold(true);
        }
    }

    public function startCell(): string
    {
        return 'B2';
    }
}
