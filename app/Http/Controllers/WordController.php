<?php

namespace App\Http\Controllers;

use App\Models\NilaiUnsur;
use App\Support\Skm;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpWord\Element\Chart;
use PhpOffice\PhpWord\Element\Table;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\Shared\Converter;
use PhpOffice\PhpWord\SimpleType\TblWidth;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        // script php word
        // Creating the new document...
        $phpWord = new \PhpOffice\PhpWord\PhpWord();

        /* Note: any element you append to a document must reside inside of a Section. */

        // Adding an empty Section to the document...
        $section = $phpWord->addSection();
        // Adding Text element to the Section having font styled by default...
        $section->addText(
            '"Learn from yesterday, live for today, hope for tomorrow. '
                . 'The important thing is not to stop questioning." '
                . '(Albert Einstein)'
        );

        /*
        * Note: it's possible to customize font style of the Text element you add in three ways:
        * - inline;
        * - using named font style (new font style object will be implicitly created);
        * - using explicitly created font style object.
        */

        // Adding Text element with font customized inline...
        $section->addText(
            '"Great achievement is usually born of great sacrifice, '
                . 'and is never the result of selfishness." '
                . '(Napoleon Hill)',
            array('name' => 'Tahoma', 'size' => 10)
        );

        // Adding Text element with font customized using named font style...
        $fontStyleName = 'oneUserDefinedStyle';
        $phpWord->addFontStyle(
            $fontStyleName,
            array('name' => 'Tahoma', 'size' => 10, 'color' => '1B2232', 'bold' => true)
        );
        $section->addText(
            '"The greatest accomplishment is not in never falling, '
                . 'but in rising again after you fall." '
                . '(Vince Lombardi)',
            $fontStyleName
        );

        // Adding Text element with font customized using explicitly created font style object...
        $fontStyle = new \PhpOffice\PhpWord\Style\Font();
        $fontStyle->setBold(true);
        $fontStyle->setName('Tahoma');
        $fontStyle->setSize(13);
        $myTextElement = $section->addText('"Believe you can and you\'re halfway there." (Theodor Roosevelt)');
        $myTextElement->setFontStyle($fontStyle);

        // Saving the document as OOXML file...
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save('helloWorld.docx');

        // Saving the document as ODF file...
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'ODText');
        $objWriter->save('helloWorld.odt');

        // Saving the document as HTML file...
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
        $objWriter->save('helloWorld.html');

        /* Note: we skip RTF, because it's not XML-based and requires a different example. */
        /* Note: we skip PDF, because "HTML-to-PDF" approach is used to create PDF documents. */


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function export(Request $request)
    {
        if (! $request->has('tw')) {
            return redirect('export?tw=' . Skm::twSekarang() . '&Tahun=' . date('Y'));
        }

        // Tanpa ini PHPWord menulis teks mentah ke XML: label "< 17 tahun" atau saran berisi "&"
        // membuat dokumen rusak dan tidak bisa dibuka Word.
        Settings::setOutputEscapingEnabled(true);

        $tahun = Skm::tahun($request);
        $periode = Skm::keteranganPeriode(Skm::tw($request));
        $query = Skm::query($request);
        $hasil = Skm::hitung($query);
        $unsur = array_values($hasil['unsur']);
        $angka = fn ($nilai, $desimal = 3) => Skm::angka($nilai, $desimal);

        $templateProcessor = new TemplateProcessor(public_path('word-template/export.docx'));

        // --- profil responden
        $rekap = [];
        foreach (array_keys(Skm::profil()) as $field) {
            $rekap[$field] = Skm::rekapProfil($query, $field);
        }
        // kalimat rincian hanya menyebut pilihan yang ada respondennya (grafik tetap menampilkan semua)
        $rincian = function (string $field) use ($rekap) {
            $terisi = array_filter($rekap[$field], fn ($b) => $b['jumlah'] > 0);
            $bagian = array_map(fn ($b) => $b['label'] . ' sebanyak ' . $b['jumlah'] . ' orang', array_values($terisi));
            if (count($bagian) < 2) {
                return $bagian[0] ?? '-';
            }
            $akhir = array_pop($bagian);

            return implode(', ', $bagian) . ' dan ' . $akhir;
        };
        $jumlah = fn (string $field, string $label) => collect($rekap[$field])->firstWhere('label', $label)['jumlah'] ?? 0;

        $disabilitasYa = $jumlah('disabilitas', 'Ya');
        $rincianDisabilitas = $disabilitasYa . ' orang';
        if ($disabilitasYa > 0) {
            $jenis = collect($rekap['jenis_disabilitas'])->where('jumlah', '>', 0)
                ->map(fn ($b) => $b['label'] . ' ' . $b['jumlah'] . ' orang')->implode(', ');
            $rincianDisabilitas .= $jenis ? ' (' . $jenis . ')' : '';
        }

        // --- unsur terendah / tertinggi (hanya unsur yang ada jawabannya)
        $terisi = collect($unsur)->where('responden', '>', 0)->sortBy('nrr')->values();
        $terendah = $terisi->first();
        $tertinggi = $terisi->last();
        $rendah = $terisi->take(4)->pluck('unsur')->pad(4, '-')->all();

        // --- bobot yang benar-benar dipakai: 1/12, atau 1/jumlah pertanyaan terisi bila ada yang kosong
        $terisiUrut = collect($unsur)->where('responden', '>', 0)->values();
        $jumlahTerisi = max($terisiUrut->count(), 1);
        $bobotTeks = $angka($hasil['bobot']) . ' (1/' . $jumlahTerisi . ')';
        $kosong = collect($unsur)->where('responden', 0)->pluck('kode');
        if ($hasil['n'] > 0 && $kosong->isNotEmpty()) {
            $bobotTeks .= '; pertanyaan ' . $kosong->implode(', ') . ' belum memiliki jawaban pada periode ini'
                . ' (data sebelum kuesioner 12 pertanyaan), sehingga bobot dibagi rata ke '
                . $jumlahTerisi . ' pertanyaan yang terisi';
        }

        $nilai = [
            'bulanAwal' => $periode['bulanAwal'],
            'bulanAkhir' => $periode['bulanAkhir'],
            'semester' => $periode['semester'],
            'tahun' => $tahun,
            'hariIni' => date('d'),
            'bulanIni' => Skm::NAMA_BULAN[(int) date('n')],
            'tahunIni' => date('Y'),
            'jmlResponden' => $hasil['n'],
            'jenkel_l' => $jumlah('jenkel', 'Laki-laki'),
            'jenkel_p' => $jumlah('jenkel', 'Perempuan'),
            'rincianUsia' => $rincian('usia'),
            'rincianPendidikan' => $rincian('pendidikan'),
            'rincianPekerjaan' => $rincian('pekerjaan'),
            'rincianLayanan' => $rincian('jenisPelayanan'),
            'rincianDisabilitas' => $rincianDisabilitas,
            'terbanyakUsia' => Skm::terbanyak($rekap['usia']),
            'terbanyakPendidikan' => Skm::terbanyak($rekap['pendidikan']),
            'terbanyakPekerjaan' => Skm::terbanyak($rekap['pekerjaan']),
            'nilaiSkm' => $angka($hasil['ikm'], 2),
            'nrrT' => $angka($hasil['nrrT']),
            'mutu' => $hasil['mutu'],
            'kinerja' => $hasil['kinerja'],
            'bobot' => $angka($hasil['bobot']),
            'bobotTeks' => $bobotTeks,
            // pertanyaan yang belum ada jawabannya tidak ikut dihitung (bobotnya dibagi ke yang terisi)
            'rumusNrr' => $terisiUrut->map(fn ($u) => '(' . $angka($u['nrr']) . ' x ' . $angka($hasil['bobot']) . ')')->implode(' + '),
            'rumusNrrt' => $terisiUrut->map(fn ($u) => $angka($u['nrrt']))->implode(' + '),
            'unsurTerendah' => $terendah['unsur'] ?? '-',
            'nilaiTerendah' => $terendah ? $angka($terendah['nrr']) : '-',
            'unsurTertinggi' => $tertinggi['unsur'] ?? '-',
            'nilaiTertinggi' => $tertinggi ? $angka($tertinggi['nrr']) : '-',
        ];
        foreach ($rendah as $i => $nama) {
            $nilai['rendah' . ($i + 1)] = $nama;
        }
        foreach ($nilai as $kunci => $isi) {
            $templateProcessor->setValue($kunci, $isi);
        }

        // --- Tabel 5 (kategori unsur) dan Tabel 6 (NRR dan NRR tertimbang)
        $templateProcessor->cloneRowAndSetValues('t5_no', array_map(fn ($u) => [
            't5_no' => $u['kode'],
            't5_unsur' => $u['unsur'],
            't5_nrr' => $angka($u['nrr']),
            't5_mutu' => $u['mutu'],
        ], $unsur));
        $templateProcessor->cloneRowAndSetValues('t6_no', array_map(fn ($u) => [
            't6_no' => $u['kode'],
            't6_unsur' => $u['unsur'],
            't6_nrr' => $angka($u['nrr']),
            't6_nrrt' => $angka($u['nrrt']),
        ], $unsur));

        // --- grafik profil responden
        $grafik = [
            'chartJenkel' => 'jenkel',
            'chartUmur' => 'usia',
            'chartPendidikan' => 'pendidikan',
            'chartPekerjaan' => 'pekerjaan',
        ];
        foreach ($grafik as $penanda => $field) {
            $chart = new Chart('column', array_column($rekap[$field], 'label'), array_column($rekap[$field], 'jumlah'));
            $chart->getStyle()->setWidth(Converter::inchToEmu(6))->setHeight(Converter::inchToEmu(2.5));
            $templateProcessor->setChart($penanda, $chart);
        }

        // --- Tabel 3: nilai per responden
        $responden = (clone $query)->orderBy('created_at')->get();
        $kolomUnsur = array_keys(Skm::unsur());

        $table = new Table(array('unit' => TblWidth::TWIP));
        $table->addRow();
        $table->addCell(900)->addText('No.');
        foreach (Skm::unsur() as $u) {
            $table->addCell(560)->addText('U' . $u['kode']);
        }
        $table->addCell(900)->addText('SKM');

        foreach ($responden as $k => $item) {
            $table->addRow();
            $table->addCell(900)->addText($k + 1);
            foreach ($kolomUnsur as $kolom) {
                $table->addCell(560)->addText($item->$kolom ?? '-');
            }
            $skor = Skm::nilaiResponden($item);
            $table->addCell(900)->addText($skor === null ? '-' : $angka($skor, 2));
        }

        $ringkasan = [
            'Total Nilai Unsur' => [fn ($u) => $u['total'], $hasil['totalNilai']],
            'NRR Per Unsur' => [fn ($u) => $angka($u['nrr']), $angka($hasil['nrr'])],
            'NRR Tertimbang' => [fn ($u) => $angka($u['nrrt']), $angka($hasil['nrrT'])],
        ];
        foreach ($ringkasan as $label => [$isi, $jumlahBaris]) {
            $table->addRow();
            $table->addCell(900)->addText($label);
            foreach ($unsur as $u) {
                $table->addCell(560)->addText($isi($u));
            }
            $table->addCell(900)->addText($jumlahBaris);
        }
        $table->addRow();
        $table->addCell(900)->addText('Nilai SKM Kecamatan Long Bagun per ' . $periode['bulanAkhir'] . ' ' . $tahun);
        foreach ($unsur as $u) {
            $table->addCell(560)->addText('');
        }
        $table->addCell(900)->addText($angka($hasil['ikm'], 2));
        $templateProcessor->setComplexBlock('{tabelNilaiUnsurPelayanan}', $table);

        // --- Tabel 7: saran
        $table = new Table(array('unit' => TblWidth::TWIP));
        $table->addRow();
        $table->addCell(700)->addText('No.');
        $table->addCell(8000)->addText('Saran Perbaikan');
        $saran = $responden->pluck('saran')->filter(fn ($s) => trim((string) $s) !== '')->values();
        foreach ($saran as $k => $isi) {
            $table->addRow();
            $table->addCell(700)->addText($k + 1);
            $table->addCell(8000)->addText($isi);
        }
        if ($saran->isEmpty()) {
            $table->addRow();
            $table->addCell(700)->addText('-');
            $table->addCell(8000)->addText('Tidak ada saran pada periode ini.');
        }
        $templateProcessor->setComplexBlock('{tabelSaran}', $table);

        $namaFile = 'Laporan SKM Kecamatan Long Bagun Semester ' . $periode['semester'] . ' Tahun ' . $tahun . '.docx';
        $path = storage_path('app/' . $namaFile);
        $templateProcessor->saveAs($path);

        return response()->download($path)->deleteFileAfterSend(true);
    }

    // $document_with_table = new \PhpOffice\PhpWord\PhpWord();
    //     $section = $document_with_table->addSection();

    //     $table = $section->addTable(['borderSize' => 3]);

    //     $table->addRow();
    //     $table->addCell(800)->addText("NO");
    //     $table->addCell(800)->addText("ID");
    //     $table->addCell(800)->addText("NAMA");
    //     $table->addCell(800)->addText("NILAI");

    //     //Open template with ${table}
    //     $templateProcessor = new TemplateProcessor('word-template/export.docx');

    //     // Replace mark by xml code of table
    //     $templateProcessor->setValue('gambarJenisKelamin', $table);

    //     //save template with table
    //     $templateProcessor->saveAs('eskm.docx');
    //     return response()->download('eskm.docx')->deleteFileAfterSend(true);
}
