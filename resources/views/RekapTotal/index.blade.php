@extends('layouts.index', ['title' => 'Resume'])

@php
    use App\Support\Skm;

    $th = 'px-3 py-2 text-center text-[11px] font-semibold text-white uppercase border border-[#137A5E] whitespace-nowrap';
    $td = 'px-3 py-2 text-center text-sm text-slate-700 border border-slate-200';
    $identitas = [
        'jenisPelayanan' => 'Jenis Layanan',
        'tanggal_layanan' => 'Tgl. Layanan',
        'jenkel' => 'Jenis Kelamin',
        'usia' => 'Usia',
        'pendidikan' => 'Pendidikan',
        'pekerjaan' => 'Pekerjaan',
        'disabilitas' => 'Disabilitas',
    ];
@endphp

@section('content')
    <div class="absolute top-0 left-[215px] right-2 bottom-2 p-2">
        <div class="bg-white h-full w-full rounded-xl p-4 shadow-sm border border-slate-200 flex flex-col">
            <div class="flex flex-col xl:flex-row xl:items-start xl:justify-between gap-3 pb-4">
                <p class="text-[22px] lg:text-[28px] font-black text-[#137A5E] leading-tight">RESUME</p>
                @include('partials.filter_admin', [
                    'tombol' => [['label' => 'DOWNLOAD', 'href' => url('/exportResume') . '?' . Skm::queryString(request())]],
                ])
            </div>

            <div class="rounded-xl border border-[#137A5E] overflow-auto flex-1 min-h-0">
                <table class="min-w-[1600px] w-full border-collapse">
                    <thead class="sticky top-0 z-10" style="background-color: #137A5E;">
                        <tr>
                            <th scope="col" rowspan="2" class="{{ $th }}">No.</th>
                            <th scope="col" rowspan="2" class="{{ $th }}">Tgl. Survei</th>
                            @foreach ($identitas as $judul)
                                <th scope="col" rowspan="2" class="{{ $th }}">{{ $judul }}</th>
                            @endforeach
                            <th scope="col" colspan="{{ count(Skm::unsur()) }}" class="{{ $th }}">Nilai Unsur Pelayanan</th>
                            <th scope="col" rowspan="2" class="{{ $th }}">Saran</th>
                            <th scope="col" rowspan="2" class="{{ $th }}">Aksi</th>
                        </tr>
                        <tr>
                            @foreach (Skm::unsur() as $u)
                                <th scope="col" class="{{ $th }}" title="{{ $u['pertanyaan'] }}">{{ $u['kode'] }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($selects as $data)
                            <tr class="{{ $loop->even ? 'bg-[#E3E3E3]' : 'bg-white' }}">
                                <td class="{{ $td }}">{{ $selects->firstItem() + $loop->index }}</td>
                                <td class="{{ $td }} whitespace-nowrap">{{ date('d-m-Y', strtotime($data->created_at)) }}</td>
                                @foreach (array_keys($identitas) as $field)
                                    <td class="{{ $td }}">
                                        @if ($field === 'tanggal_layanan')
                                            {{ $data->tanggal_layanan ? date('d-m-Y', strtotime($data->tanggal_layanan)) : '-' }}
                                        @elseif ($field === 'disabilitas')
                                            {{ $data->disabilitas ?? '-' }}{{ $data->jenis_disabilitas ? ' (' . $data->jenis_disabilitas . ')' : '' }}
                                        @else
                                            {{ $data->$field ?? '-' }}
                                        @endif
                                    </td>
                                @endforeach
                                @foreach (array_keys(Skm::unsur()) as $k)
                                    <td class="{{ $td }}">{{ $data->$k ?? '-' }}</td>
                                @endforeach
                                <td class="{{ $td }} text-left min-w-[200px]">{{ $data->saran ?: '-' }}</td>
                                <td class="{{ $td }}">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('rekapTotal.destroy', $data->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="Tahun" value="{{ Skm::tahun(request()) }}">
                                        <button type="submit" class="text-red-700 hover:text-red-900" title="Hapus">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="{{ count($identitas) + count(Skm::unsur()) + 4 }}" class="{{ $td }}">Data tidak tersedia.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $selects->links() }}
            </div>
        </div>
    </div>
@endsection
