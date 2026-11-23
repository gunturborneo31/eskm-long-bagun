@php
    use App\Support\Skm;

    $request = request();
    $pilih = 'bg-white border border-gray-300 text-[#137A5E] font-bold text-4xl w-full text-center lg:w-fit lg:text-sm rounded-full px-3 py-1';
    $label = 'font-bold text-white text-4xl lg:text-base drop-shadow-[0_3px_3px_rgba(0,0,0,0.3)]';
@endphp
<!doctype html>
<html class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" conteitial-scale="1.0">
    <title>E-SKM Kecamatan Long Bagun</title>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.54.1/dist/apexcharts.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="items-center bg-fixed w-full grid grid-cols-1"
    style="background-color: #137A5E; background-image: radial-gradient(at -30% -30%, #137A5E, transparent 80%), radial-gradient(at 130% 150%, #137A5E, transparent 80%);">
    <div class="min-h-screen lg:px-20 px-3 flex flex-col">
        <div class="flex justify-between py-[20px] lg:py-1 items-center">
            <div class="flex items-center gap-3 justify-between w-full lg:justify-normal">
                <img src="/assets/logo_mahulu.png" class="h-[70px] lg:h-[48px] w-auto object-contain p-1 rounded-xl bg-white"
                    alt="Lambang Kabupaten Mahakam Ulu">
                <div
                    class="rounded-full lg:whitespace-nowrap text-4xl lg:text-2xl font-bold text-white lg:text-left text-right drop-shadow-[0_3px_3px_rgba(0,0,0,0.3)]">
                    E-SKM <br class="lg:hidden"> KECAMATAN LONG BAGUN<br class="lg:hidden">KABUPATEN MAHAKAM ULU
                </div>
            </div>
            <div class="hidden lg:block">
                <a href="/login">
                    <div class="rounded-full whitespace-nowrap p-2 text-xs bg-white font-bold text-[#137A5E]">Halaman Admin</div>
                </a>
            </div>
        </div>
        <hr class="mt-1 lg:border-1 border-3">

        <form method="GET" class="lg:flex gap-4 justify-end items-center my-2">
            <div class="flex flex-row items-center gap-3 mb-5 lg:mb-0">
                <label class="{{ $label }}">Tahun</label>
                <select name="Tahun" onchange="this.form.submit()" class="{{ $pilih }}">
                    @include('partials.year_options', ['selectedYear' => Skm::tahun($request)])
                </select>
            </div>
            <div class="flex flex-row items-center gap-3 mb-5 lg:mb-0">
                <label class="{{ $label }}">Triwulan</label>
                <select name="tw" onchange="this.form.submit()" class="{{ $pilih }}">
                    @foreach (Skm::TRIWULAN as $kode => $nama)
                        <option value="{{ $kode }}" {{ Skm::tw($request) === $kode ? 'selected' : '' }}>{{ $nama }}</option>
                    @endforeach
                </select>
            </div>
        </form>

        <p class="text-white font-bold text-4xl lg:text-base mb-2">
            {{ $hasil['n'] }} responden &middot; Nilai SKM {{ Skm::angka($hasil['ikm'], 2) }} &middot;
            Mutu {{ $hasil['mutu'] }}
        </p>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-2 mb-5 text-4xl lg:text-sm">
            @include('partials.profil_responden', ['query' => $query, 'teks' => 'text-4xl lg:text-sm'])

            <div class="lg:col-span-2">
                <a href="/?{{ http_build_query(['tw' => Skm::tw($request), 'Tahun' => Skm::tahun($request)]) }}">
                    <button type="button"
                        class="bg-white w-full b-0 p-3 mb-10 shadow-2xl text-5xl lg:text-xl font-semibold rounded-2xl text-[#137A5E]">
                        KEMBALI KE DASHBOARD</button>
                </a>
            </div>
        </div>
    </div>
</body>

</html>
