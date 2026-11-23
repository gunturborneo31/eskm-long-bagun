@extends('layouts.index', ['title' => 'Nilai Unsur'])

@php
    use App\Support\Skm;

    $th = 'px-2 py-2 text-center text-[11px] font-semibold text-white uppercase border border-[#137A5E]';
    $td = 'px-3 py-2 text-center text-sm font-medium text-slate-700 border border-slate-200';
    $tf = 'px-3 py-2 text-center text-sm font-semibold border border-[#137A5E]';
    $latar = 'background-color: #137A5E;';
@endphp

@section('content')
    <div class="absolute top-0 left-[215px] right-2 bottom-2 p-2">
        <div class="bg-white h-full w-full rounded-xl p-4 shadow-sm border border-slate-200 flex flex-col">
            <div class="flex flex-col xl:flex-row xl:items-start xl:justify-between gap-3 pb-4">
                <p class="text-[22px] lg:text-[28px] font-black text-[#137A5E] leading-tight">RESUME / NILAI UNSUR</p>
                @include('partials.filter_admin', [
                    'tombol' => [['label' => 'DOWNLOAD', 'href' => url('/exportNilaiUnsur') . '?' . Skm::queryString(request())]],
                ])
            </div>

            <div class="w-full flex-1 min-h-0 flex flex-col">
                <div class="rounded-xl border border-[#137A5E] overflow-hidden">
                    <div class="overflow-auto max-h-[45vh]">
                        <table class="min-w-[1000px] w-full border-collapse">
                            <thead class="sticky top-0 z-10" style="{{ $latar }}">
                                <tr>
                                    <th scope="col" rowspan="2" class="{{ $th }} w-[90px]">No.<br>Responden</th>
                                    <th scope="col" colspan="{{ count(Skm::unsur()) + 1 }}" class="{{ $th }}">Nilai Unsur Pelayanan</th>
                                </tr>
                                <tr>
                                    @foreach (Skm::unsur() as $u)
                                        <th scope="col" class="{{ $th }} w-[60px]" title="{{ $u['pertanyaan'] }}">{{ $u['kode'] }}</th>
                                    @endforeach
                                    <th scope="col" class="{{ $th }} w-[90px]">Nilai SKM</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($selects as $data)
                                    <tr class="{{ $loop->even ? 'bg-[#E3E3E3]' : 'bg-white' }}">
                                        <td class="{{ $td }}">{{ $selects->firstItem() + $loop->index }}</td>
                                        @foreach (array_keys(Skm::unsur()) as $k)
                                            <td class="{{ $td }}">{{ $data->$k ?? '-' }}</td>
                                        @endforeach
                                        @php $nilai = Skm::nilaiResponden($data); @endphp
                                        <td class="{{ $td }} font-bold">{{ $nilai === null ? '-' : Skm::angka($nilai, 2) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="{{ count(Skm::unsur()) + 2 }}" class="{{ $td }}">Data tidak tersedia.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="mt-3 rounded-xl border border-[#137A5E] overflow-auto">
                    <table class="min-w-[1000px] w-full border-collapse">
                        <thead style="{{ $latar }}">
                            <tr class="text-white">
                                <td class="{{ $tf }} text-left w-[150px]">Unsur</td>
                                @foreach ($hasil['unsur'] as $u)
                                    <td class="{{ $tf }}">{{ $u['kode'] }}</td>
                                @endforeach
                                <td class="{{ $tf }}">Jumlah</td>
                            </tr>
                            <tr class="text-white">
                                <td class="{{ $tf }} text-left">Total Nilai Unsur</td>
                                @foreach ($hasil['unsur'] as $u)
                                    <td class="{{ $tf }}">{{ $u['total'] }}</td>
                                @endforeach
                                <td class="{{ $tf }}">{{ $hasil['totalNilai'] }}</td>
                            </tr>
                            <tr class="text-white">
                                <td class="{{ $tf }} text-left">NRR Per Unsur</td>
                                @foreach ($hasil['unsur'] as $u)
                                    <td class="{{ $tf }}">{{ Skm::angka($u['nrr']) }}</td>
                                @endforeach
                                <td class="{{ $tf }}">{{ Skm::angka($hasil['nrr']) }}</td>
                            </tr>
                            <tr class="text-white">
                                <td class="{{ $tf }} text-left">NRR Tertimbang</td>
                                @foreach ($hasil['unsur'] as $u)
                                    <td class="{{ $tf }}">{{ Skm::angka($u['nrrt']) }}</td>
                                @endforeach
                                <td class="{{ $tf }}">{{ Skm::angka($hasil['nrrT']) }}</td>
                            </tr>
                            <tr class="text-white">
                                <td class="{{ $tf }} text-left">Nilai SKM (x 25)</td>
                                <td class="{{ $tf }}" colspan="{{ count($hasil['unsur']) }}">
                                    Bobot per unsur = 1/{{ round(1 / $hasil['bobot']) }} &middot;
                                    Mutu {{ $hasil['mutu'] }} &middot; {{ $hasil['kinerja'] }}
                                </td>
                                <td class="{{ $tf }}">{{ Skm::angka($hasil['ikm'], 2) }}</td>
                            </tr>
                        </thead>
                    </table>
                </div>

                <div class="mt-3">
                    {{ $selects->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
