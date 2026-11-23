{{--
    Grafik + tabel jumlah responden untuk setiap pertanyaan identitas.
    Parameter: $query (query responden terfilter), $teks (kelas ukuran teks, opsional)
--}}
@php
    use App\Support\Skm;

    $teks = $teks ?? 'text-sm';
    $grafik = [];
@endphp

@foreach (Skm::profil() as $field => $def)
    @php
        $rekap = Skm::rekapProfil($query, $field);
        $grafik[$field] = [
            'labels' => array_column($rekap, 'label'),
            'series' => array_column($rekap, 'jumlah'),
        ];
    @endphp
    <div class="bg-white rounded-xl p-3 flex flex-col">
        <p class="font-bold text-[#137A5E]">{{ $def['judul'] }}</p>
        <div id="grafik-{{ $field }}" class="mx-auto p-2 w-full max-w-md"></div>
    </div>
    <div class="bg-white rounded-xl p-3 flex flex-col">
        <p class="font-bold text-[#137A5E] mb-3">{{ $def['judul'] }}</p>
        <table class="w-full {{ $teks }}">
            <thead class="bg-[#137A5E] text-white">
                <tr>
                    <th scope="col" class="px-4 py-1">No</th>
                    <th scope="col" class="px-4 py-1 text-left">{{ $def['judul'] }}</th>
                    <th scope="col" class="px-4 py-1">Jumlah</th>
                    <th scope="col" class="px-4 py-1">%</th>
                </tr>
            </thead>
            <tbody class="border">
                @foreach ($rekap as $baris)
                    <tr class="border-b bg-white">
                        <td class="px-4 py-1 text-center">{{ $loop->iteration }}</td>
                        <td class="px-4 py-1">{{ $baris['label'] }}</td>
                        <td class="px-4 py-1 text-center">{{ $baris['jumlah'] }}</td>
                        <td class="px-4 py-1 text-center">{{ Skm::angka($baris['persen'], 1) }}</td>
                    </tr>
                @endforeach
                @if (empty($rekap))
                    <tr>
                        <td colspan="4" class="px-4 py-1 text-center">Belum ada pilihan.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endforeach

<script>
    window.addEventListener("load", function() {
        if (typeof ApexCharts === 'undefined') return;
        const warna = ["#137A5E", "#16BDCA", "#e26666", "#383838", "#ddf71d", "#521bd3", "#f59e0b", "#0ea5e9",
            "#a855f7", "#84cc16", "#f43f5e", "#64748b"
        ];
        const grafik = @json($grafik);
        Object.entries(grafik).forEach(([field, data]) => {
            const el = document.getElementById('grafik-' + field);
            if (!el) return;
            if (data.series.reduce((a, b) => a + b, 0) === 0) {
                el.innerHTML = '<p class="text-center text-slate-400 py-10">Belum ada data</p>';
                return;
            }
            new ApexCharts(el, {
                series: data.series,
                labels: data.labels,
                colors: warna,
                chart: {
                    height: 260,
                    width: "100%",
                    type: "pie"
                },
                stroke: {
                    colors: ["white"]
                },
                dataLabels: {
                    enabled: true,
                    formatter: value => value.toFixed(1) + ' %'
                },
                legend: {
                    position: "bottom"
                },
            }).render();
        });
    });
</script>
