{{--
    Filter periode + profil responden untuk halaman admin.
    Parameter: $tombol = [['label' => ..., 'href' => ...], ...] (opsional)
--}}
@php
    use App\Support\Skm;

    $request = request();
    $filterAktif = Skm::filter($request);
    $pilih = 'bg-white border border-gray-300 text-[#137A5E] font-bold text-sm rounded-full px-3 py-1 focus:outline-none focus:ring-2 focus:ring-[#137A5E]/30';
@endphp

<form method="GET" action="{{ url()->current() }}" class="flex flex-col gap-2">
    <div class="flex flex-wrap items-center gap-2">
        <div class="flex items-center gap-2 rounded-full border border-[#137A5E] bg-slate-50 px-3 py-2">
            <label class="text-sm font-bold text-[#137A5E]">Tahun</label>
            <select name="Tahun" onchange="this.form.submit()" class="{{ $pilih }}">
                @include('partials.year_options', ['selectedYear' => Skm::tahun($request)])
            </select>
        </div>

        <div class="flex items-center gap-2 rounded-full border border-[#137A5E] bg-slate-50 px-3 py-2">
            <label class="text-sm font-bold text-[#137A5E]">Triwulan</label>
            <select name="tw" onchange="this.form.submit()" class="{{ $pilih }}">
                @foreach (Skm::TRIWULAN as $kode => $nama)
                    <option value="{{ $kode }}" {{ Skm::tw($request) === $kode ? 'selected' : '' }}>{{ $nama }}</option>
                @endforeach
            </select>
        </div>

        @foreach ($tombol ?? [] as $t)
            <a href="{{ $t['href'] }}"
                class="inline-flex items-center justify-center bg-[#137A5E] hover:bg-[#0E6048] rounded-full font-bold text-sm px-4 py-2 text-white transition">
                {{ $t['label'] }}
            </a>
        @endforeach
    </div>

    <div class="flex flex-wrap items-center gap-2">
        <span class="text-sm font-bold text-[#137A5E]">Filter:</span>
        @foreach (Skm::profil() as $field => $def)
            <select name="filter[{{ $field }}]" onchange="this.form.submit()"
                class="{{ $pilih }} {{ isset($filterAktif[$field]) ? '!bg-[#137A5E] !text-white' : '' }}">
                <option value="">{{ $def['judul'] }}: Semua</option>
                @foreach (array_keys($def['opsi']) as $label)
                    <option value="{{ $label }}" {{ ($filterAktif[$field] ?? null) === $label ? 'selected' : '' }}>
                        {{ $label }}</option>
                @endforeach
            </select>
        @endforeach
        @if ($filterAktif)
            <a href="{{ url()->current() }}?{{ http_build_query(['tw' => Skm::tw($request), 'Tahun' => Skm::tahun($request)]) }}"
                class="text-sm font-bold text-red-700 underline">Hapus filter</a>
        @endif
    </div>
</form>
