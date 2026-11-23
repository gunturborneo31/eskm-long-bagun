@php
    use App\Support\Skm;

    $request = request();
    $hasil = Skm::hitung(Skm::query($request));
    $tren = Skm::trenBulanan($request);
    $periode = Skm::TRIWULAN[Skm::tw($request)] . ' ' . Skm::tahun($request);
    $adaData = $hasil['n'] > 0;

    // warna badge mutu
    $warnaMutu = [
        'A' => 'bg-emerald-600 text-white',
        'B' => 'bg-teal-500 text-white',
        'C' => 'bg-amber-400 text-slate-900',
        'D' => 'bg-red-600 text-white',
        '-' => 'bg-slate-200 text-slate-500',
    ];
    $badge = fn ($mutu) => $warnaMutu[$mutu] ?? $warnaMutu['-'];

    $kartu = 'rounded-2xl bg-white shadow-lg';
    $judulKartu = 'text-xs font-bold uppercase tracking-wider text-slate-500';
    $pilih = 'rounded-full border border-white/40 bg-white px-3 py-1.5 text-sm font-bold text-[#137A5E] focus:outline-none focus:ring-2 focus:ring-white/60';
@endphp

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-SKM Kecamatan Long Bagun</title>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=nunito:400,600,700,800,900" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
    <style>
        body { font-family: "Nunito", ui-sans-serif, system-ui, sans-serif; }
    </style>
</head>

<body class="min-h-screen bg-[#137A5E]"
    style="background-image: radial-gradient(at 0% 0%, #1a9473 0, transparent 55%), radial-gradient(at 100% 100%, #0e6048 0, transparent 55%);">
    <div class="mx-auto flex min-h-screen max-w-[1600px] flex-col gap-4 px-4 py-4 lg:px-8">

        {{-- Header --}}
        <header class="flex flex-wrap items-center justify-between gap-3 border-b border-white/25 pb-3">
            <div class="flex items-center gap-3">
                <img src="/assets/logo_mahulu.png" alt="Lambang Kabupaten Mahakam Ulu"
                    class="h-12 w-12 shrink-0 rounded-xl bg-white object-contain p-1 lg:h-14 lg:w-14">
                <div class="leading-tight text-white">
                    <p class="text-xl font-black tracking-wide lg:text-2xl">E-SKM KECAMATAN LONG BAGUN</p>
                    <p class="text-xs font-semibold uppercase tracking-wider text-white/80 lg:text-sm">
                        Survei Kepuasan Masyarakat &middot; Kabupaten Mahakam Ulu</p>
                </div>
            </div>
            <a href="/login"
                class="hidden rounded-full border border-white/50 px-4 py-1.5 text-xs font-bold text-white transition hover:bg-white hover:text-[#137A5E] sm:inline-block">
                Halaman Admin</a>
        </header>

        {{-- Filter periode --}}
        <form method="GET" class="flex flex-wrap items-center justify-between gap-3">
            <p class="text-sm font-semibold text-white/90">Periode: <span class="font-black text-white">{{ $periode }}</span></p>
            <div class="flex flex-wrap items-center gap-2">
                <label class="text-sm font-bold text-white" for="pilih-tahun">Tahun</label>
                <select id="pilih-tahun" name="Tahun" onchange="this.form.submit()" class="{{ $pilih }}">
                    @include('partials.year_options', ['selectedYear' => Skm::tahun($request)])
                </select>
                <label class="ml-1 text-sm font-bold text-white" for="pilih-tw">Triwulan</label>
                <select id="pilih-tw" name="tw" onchange="this.form.submit()" class="{{ $pilih }} max-w-[230px]">
                    @foreach (Skm::TRIWULAN as $kode => $nama)
                        <option value="{{ $kode }}" {{ Skm::tw($request) === $kode ? 'selected' : '' }}>{{ $nama }}</option>
                    @endforeach
                </select>
            </div>
        </form>

        {{-- Ringkasan --}}
        <section class="grid grid-cols-2 gap-3 lg:grid-cols-12 lg:gap-4">
            <div class="{{ $kartu }} col-span-2 flex flex-col justify-center p-5 lg:col-span-4">
                <p class="{{ $judulKartu }}">Nilai SKM</p>
                <p class="mt-1 text-6xl font-black leading-none text-[#137A5E] lg:text-7xl">
                    {{ $adaData ? Skm::angka($hasil['ikm'], 2) : '-' }}</p>
                <p class="mt-2 text-xs text-slate-500">Skala 25 &ndash; 100 &middot; Permen PANRB No. 14 Tahun 2017</p>
            </div>

            <div class="{{ $kartu }} flex flex-col items-center justify-center p-4 text-center lg:col-span-2">
                <p class="{{ $judulKartu }}">Mutu Pelayanan</p>
                <span class="mt-2 inline-flex h-16 w-16 items-center justify-center rounded-2xl text-4xl font-black {{ $badge($hasil['mutu']) }}">
                    {{ $hasil['mutu'] }}</span>
            </div>

            <div class="{{ $kartu }} flex flex-col items-center justify-center p-4 text-center lg:col-span-3">
                <p class="{{ $judulKartu }}">Kinerja Unit Pelayanan</p>
                <p class="mt-2 text-xl font-black leading-tight text-[#137A5E] lg:text-2xl">{{ $hasil['kinerja'] }}</p>
            </div>

            <div class="{{ $kartu }} col-span-2 flex items-center justify-between gap-4 p-4 sm:col-span-2 lg:col-span-3 lg:flex-col lg:justify-center lg:text-center">
                <div>
                    <p class="{{ $judulKartu }}">Total Responden</p>
                    <p class="mt-1 text-5xl font-black leading-none text-[#137A5E]">{{ $hasil['n'] }}</p>
                </div>
                <a href="/dashboard?{{ Skm::queryString($request) }}"
                    class="rounded-full bg-[#137A5E]/10 px-4 py-2 text-xs font-bold text-[#137A5E] transition hover:bg-[#137A5E] hover:text-white lg:mt-3">
                    Lihat profil responden &rarr;</a>
            </div>
        </section>

        {{-- Tombol survei --}}
        <a href="/skm#layanan"
            class="flex items-center justify-center gap-2 rounded-2xl bg-white py-4 text-lg font-black tracking-wide text-[#137A5E] shadow-lg ring-4 ring-white/20 transition hover:bg-emerald-50 lg:hidden">
            KLIK UNTUK MEMULAI SURVEI &rarr;</a>

        {{-- Grafik + tabel unsur --}}
        <section class="grid grid-cols-1 gap-3 lg:grid-cols-12 lg:gap-4">
            <div class="flex flex-col gap-3 lg:col-span-7 lg:gap-4">
                <div class="{{ $kartu }} p-4">
                    <div class="mb-2 flex flex-wrap items-baseline justify-between gap-2">
                        <p class="font-black text-[#137A5E]">Perkembangan Nilai SKM</p>
                        <p class="text-xs text-slate-500">Nilai kumulatif dari awal periode sampai akhir tiap bulan</p>
                    </div>
                    <div class="relative h-[260px] lg:h-[300px]">
                        <canvas id="grafik-skm" aria-label="Grafik nilai SKM per bulan" role="img"></canvas>
                    </div>
                </div>

                <div class="{{ $kartu }} p-4">
                    <p class="mb-3 font-black text-[#137A5E]">Kategori Mutu Pelayanan</p>
                    <div class="grid grid-cols-2 gap-2 sm:grid-cols-4">
                        @foreach (Skm::tabelKonversi() as $k)
                            <div class="flex items-center gap-3 rounded-xl border p-2 {{ $hasil['mutu'] === $k['mutu'] ? 'border-[#137A5E] bg-emerald-50' : 'border-slate-200' }}">
                                <span class="inline-flex h-9 w-9 shrink-0 items-center justify-center rounded-lg text-lg font-black {{ $badge($k['mutu']) }}">{{ $k['mutu'] }}</span>
                                <div class="leading-tight">
                                    <p class="text-xs font-bold text-slate-700">{{ $k['kinerja'] }}</p>
                                    <p class="text-[11px] text-slate-500">{{ $k['konversi'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <a href="/skm#layanan"
                    class="hidden items-center justify-center gap-2 rounded-2xl bg-white py-4 text-lg font-black tracking-wide text-[#137A5E] shadow-lg ring-4 ring-white/20 transition hover:bg-emerald-50 lg:flex">
                    KLIK UNTUK MEMULAI SURVEI &rarr;</a>
            </div>

            <div class="{{ $kartu }} overflow-hidden lg:col-span-5">
                <p class="px-4 pt-4 font-black text-[#137A5E]">Nilai per Unsur Pelayanan</p>
                <p class="px-4 pb-3 text-xs text-slate-500">Nilai rata-rata (NRR) skala 1 &ndash; 4</p>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-[#137A5E] text-xs uppercase tracking-wide text-white">
                            <tr>
                                <th scope="col" class="px-3 py-2 text-center">No</th>
                                <th scope="col" class="px-3 py-2 text-left">Unsur</th>
                                <th scope="col" class="px-3 py-2 text-right">NRR</th>
                                <th scope="col" class="px-3 py-2 text-center">Mutu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hasil['unsur'] as $u)
                                @php $terisi = $u['responden'] > 0; @endphp
                                <tr class="border-b border-slate-100 {{ $loop->even ? 'bg-slate-50' : 'bg-white' }}" title="{{ $u['pertanyaan'] }}">
                                    <td class="px-3 py-1.5 text-center font-bold text-slate-500">{{ $u['kode'] }}</td>
                                    <td class="px-3 py-1.5 {{ $terisi ? 'text-slate-800' : 'text-slate-400' }}">{{ $u['unsur'] }}</td>
                                    <td class="px-3 py-1.5 text-right font-bold tabular-nums {{ $terisi ? 'text-slate-800' : 'text-slate-400' }}">
                                        {{ $terisi ? Skm::angka($u['nrr']) : '-' }}</td>
                                    <td class="px-3 py-1.5 text-center">
                                        <span class="inline-flex h-6 w-6 items-center justify-center rounded-md text-xs font-black {{ $badge($u['mutu']) }}">{{ $u['mutu'] }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if ($adaData && collect($hasil['unsur'])->contains('responden', 0))
                    <p class="px-4 py-3 text-[11px] text-slate-500">Tanda &ldquo;-&rdquo; : belum ada jawaban pada periode ini
                        (data sebelum kuesioner 12 pertanyaan), tidak ikut dihitung.</p>
                @endif
            </div>
        </section>

        <footer class="pb-2 text-center text-xs text-white/70">
            <a href="/login" class="underline sm:hidden">Halaman Admin</a>
            <span class="hidden sm:inline">&copy; {{ date('Y') }} Kecamatan Long Bagun &middot; Kabupaten Mahakam Ulu</span>
        </footer>
    </div>

    <script>
        (function() {
            const el = document.getElementById('grafik-skm');
            if (!el || typeof Chart === 'undefined') return;
            const data = @json($tren);
            new Chart(el, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nop', 'Des'],
                    datasets: [{
                        label: 'Nilai SKM',
                        data: data,
                        backgroundColor: '#137A5E',
                        hoverBackgroundColor: '#0E6048',
                        borderRadius: 6,
                        maxBarThickness: 36,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            callbacks: {
                                label: c => 'Nilai SKM: ' + (c.parsed.y ? c.parsed.y.toFixed(2).replace('.', ',') : '-')
                            }
                        }
                    },
                    scales: {
                        y: { beginAtZero: true, max: 100, ticks: { stepSize: 25 }, grid: { color: '#eef2f1' } },
                        x: { grid: { display: false } }
                    }
                }
            });
        })();
    </script>
</body>

</html>
