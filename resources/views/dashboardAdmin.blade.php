@extends('layouts.index', ['title' => 'Dashboard'])

@php
    use App\Support\Skm;
@endphp

@section('content')
    <div class="absolute top-0 left-[215px] right-2 bottom-2 p-2">
        <div class="bg-white h-full w-full rounded-xl p-4 shadow-sm border border-slate-200 flex flex-col">
            <div class="flex flex-col xl:flex-row xl:items-start xl:justify-between gap-3 pb-4">
                <div>
                    <p class="text-[22px] lg:text-[28px] font-black text-[#137A5E] leading-tight">DASHBOARD</p>
                    <p class="text-sm font-semibold text-slate-600">
                        {{ $hasil['n'] }} responden &middot; Nilai SKM {{ Skm::angka($hasil['ikm'], 2) }}
                        &middot; Mutu {{ $hasil['mutu'] }} ({{ $hasil['kinerja'] }})
                    </p>
                </div>
                @include('partials.filter_admin', [
                    'tombol' => [['label' => 'DOWNLOAD', 'href' => url('/exportResume') . '?' . Skm::queryString(request())]],
                ])
            </div>

            <div class="overflow-y-auto flex-1 min-h-0 rounded-xl p-3 bg-[#137A5E]">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-2 text-sm">
                    @include('partials.profil_responden', ['query' => $query])
                </div>
            </div>
        </div>
    </div>
@endsection
