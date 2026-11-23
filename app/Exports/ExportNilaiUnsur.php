<?php

namespace App\Exports;

use App\Support\Skm;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

/**
 * Halaman Nilai Unsur: hanya angka jawaban U1-U12 per responden + rekap NRR/IKM,
 * tanpa identitas responden dan saran (versi lengkapnya ada di ExportResume).
 */
class ExportNilaiUnsur implements FromArray, WithHeadings, ShouldAutoSize, WithStyles
{
    private int $jumlahResponden = 0;

    public function headings(): array
    {
        $judul = ['NO'];
        foreach (Skm::unsur() as $u) {
            $judul[] = 'U' . $u['kode'];
        }
        $judul[] = 'NILAI SKM';

        return $judul;
    }

    public function array(): array
    {
        $query = Skm::query(request());
        $kolomUnsur = array_keys(Skm::unsur());

        $baris = [];
        foreach ((clone $query)->orderBy('created_at')->get($kolomUnsur) as $i => $data) {
            $isi = [$i + 1];
            foreach ($kolomUnsur as $k) {
                $isi[] = $data->$k === null ? null : (int) $data->$k;
            }
            $nilai = Skm::nilaiResponden($data);
            $isi[] = $nilai === null ? null : round($nilai, 2);
            $baris[] = $isi;
        }
        $this->jumlahResponden = count($baris);

        $hasil = Skm::hitung($query);
        $unsur = array_values($hasil['unsur']);
        $baris[] = ['']; // baris pemisah (array kosong dilewati oleh Laravel Excel)
        $baris[] = array_merge(['TOTAL NILAI UNSUR'], array_column($unsur, 'total'), [$hasil['totalNilai']]);
        $baris[] = array_merge(['NRR PER UNSUR'], array_map(fn ($u) => round($u['nrr'], 3), $unsur), [round($hasil['nrr'], 3)]);
        $baris[] = array_merge(['NRR TERTIMBANG'], array_map(fn ($u) => round($u['nrrt'], 3), $unsur), [round($hasil['nrrT'], 3)]);
        $baris[] = array_merge(['NILAI SKM (x 25)'], array_fill(0, count($unsur), null), [round($hasil['ikm'], 2)]);

        return $baris;
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('1')->getFont()->setBold(true);
        $sheet->getStyle($sheet->calculateWorksheetDimension())
            ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // baris rekap: judul di kolom A rata kiri dan tebal
        $awal = $this->jumlahResponden + 3;
        $sheet->getStyle("A{$awal}:A" . ($awal + 3))->getFont()->setBold(true);
        $sheet->getStyle("A{$awal}:A" . ($awal + 3))->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
    }
}
