@extends('layouts.index', ['title' => 'Nilai SKM'])

@php
    use App\Support\Skm;

    $kotak = 'rounded-xl w-full p-3 mb-3 bg-[#137A5E]';
    $th = 'px-4 py-2 font-medium text-white';
    $td = 'whitespace-nowrap px-4 py-1 font-normal text-xs';
    $bobot = round(1 / $hasil['bobot']);
@endphp

@section('content')
    <div class="absolute top-0 left-[215px] right-2 bottom-2 p-2">
        <div class="bg-white h-full w-full rounded-xl p-4 shadow-sm border border-slate-200 flex flex-col">
            <div class="flex flex-col xl:flex-row xl:items-start xl:justify-between gap-3 pb-4">
                <p class="text-[22px] lg:text-[28px] font-black text-[#137A5E] leading-tight">RESUME / NILAI SKM</p>
                @include('partials.filter_admin', [
                    'tombol' => [['label' => 'DOWNLOAD LAPORAN SKM', 'href' => url('/export') . '?' . Skm::queryString(request())]],
                ])
            </div>

            <div class="overflow-y-auto flex-1 min-h-0">
                <div class="{{ $kotak }}">
                    <button type="button" onclick="toggle('konversi')"
                        class="flex w-full mb-1 justify-between text-white text-base font-bold">
                        <span>Tabel Konversi</span><span>&#9662;</span>
                    </button>
                    <div id="konversi" class="hidden mt-2">
                        <table class="w-full border">
                            <thead>
                                <tr>
                                    <th class="{{ $th }}">Nilai Persepsi</th>
                                    <th class="{{ $th }}">Nilai Interval</th>
                                    <th class="{{ $th }}">Nilai Interval Konversi</th>
                                    <th class="{{ $th }}">Mutu Pelayanan</th>
                                    <th class="{{ $th }}">Kinerja Unit Pelayanan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Skm::tabelKonversi() as $k)
                                    <tr class="border-b bg-white">
                                        <td class="{{ $td }} text-center">{{ $k['persepsi'] }}</td>
                                        <td class="{{ $td }} text-center">{{ $k['interval'] }}</td>
                                        <td class="{{ $td }} text-center">{{ $k['konversi'] }}</td>
                                        <td class="{{ $td }} text-center">{{ $k['mutu'] }}</td>
                                        <td class="{{ $td }} text-center">{{ $k['kinerja'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="{{ $kotak }}">
                    <button type="button" onclick="toggle('rumus')"
                        class="flex w-full mb-1 justify-between text-white text-base font-bold">
                        <span>Rumus Perhitungan</span><span>&#9662;</span>
                    </button>
                    <div id="rumus" class="hidden mt-2">
                        <table class="w-full border">
                            <tbody>
                                @foreach ([
                                    'Nilai Rata - Rata Per-unsur' => 'Jumlah nilai per-unsur / Jumlah responden yang menjawab unsur tersebut',
                                    'Nilai Tertimbang' => 'Nilai rata - rata per-unsur x Nilai penimbang',
                                    'Nilai Penimbang' => '1/' . Skm::JUMLAH_UNSUR . ' = ' . Skm::angka(1 / Skm::JUMLAH_UNSUR, 6) . ' (12 unsur pertanyaan)',
                                    'Nilai Indeks' => 'Jumlah nilai rata - rata tertimbang per-unsur',
                                    'Nilai SKM' => 'Nilai Indeks x 25',
                                ] as $nama => $rumus)
                                    <tr class="border-b bg-white">
                                        <td class="{{ $td }} w-[200px]">{{ $nama }}</td>
                                        <td class="{{ $td }}">: {{ $rumus }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if ($bobot != Skm::JUMLAH_UNSUR && $hasil['n'] > 0)
                            <p class="text-white text-xs mt-2">Pada periode ini hanya {{ $bobot }} unsur yang memiliki
                                jawaban (data survei lama), sehingga penimbang yang dipakai 1/{{ $bobot }}.</p>
                        @endif
                    </div>
                </div>

                <div class="{{ $kotak }}">
                    <div class="flex mb-3 justify-between text-white text-base font-bold">
                        <span>Tabel Nilai Survey</span>
                        <span>{{ $hasil['n'] }} responden</span>
                    </div>
                    <table class="w-full border">
                        <thead>
                            <tr>
                                <th class="{{ $th }}">No</th>
                                <th class="{{ $th }} text-left">Unsur Pelayanan</th>
                                <th class="{{ $th }}">Nilai Rata-Rata (NRR)</th>
                                <th class="{{ $th }}">NRR Tertimbang</th>
                                <th class="{{ $th }}">Mutu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hasil['unsur'] as $u)
                                <tr class="border-b bg-white">
                                    <td class="{{ $td }} text-center">{{ $u['kode'] }}</td>
                                    <td class="px-4 py-1 text-xs">
                                        <span class="font-semibold">{{ $u['unsur'] }}</span><br>
                                        <span class="text-slate-500">{{ $u['pertanyaan'] }}</span>
                                    </td>
                                    <td class="{{ $td }} text-center">{{ Skm::angka($u['nrr']) }}</td>
                                    <td class="{{ $td }} text-center">{{ Skm::angka($u['nrrt']) }}</td>
                                    <td class="{{ $td }} text-center">{{ $u['mutu'] }}</td>
                                </tr>
                            @endforeach
                            <tr class="border-b bg-white font-bold">
                                <td colspan="3" class="{{ $td }}">Nilai Indeks (NI)</td>
                                <td class="{{ $td }} text-center">{{ Skm::angka($hasil['nrrT']) }}</td>
                                <td class="{{ $td }} text-center">{{ $hasil['n'] ? Skm::mutuNrr($hasil['nrrT']) : '-' }}</td>
                            </tr>
                            <tr class="border-b bg-white font-bold">
                                <td colspan="3" class="{{ $td }}">Nilai SKM setelah dikonversi (NI x 25)</td>
                                <td class="{{ $td }} text-center">{{ Skm::angka($hasil['ikm'], 2) }}</td>
                                <td class="{{ $td }} text-center">{{ $hasil['mutu'] }}</td>
                            </tr>
                            <tr class="bg-white font-bold">
                                <td colspan="3" class="{{ $td }}">Kinerja Unit Pelayanan</td>
                                <td colspan="2" class="{{ $td }} text-center">{{ $hasil['kinerja'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function toggle(id) {
            document.getElementById(id).classList.toggle('hidden');
        }
    </script>
@endsection
