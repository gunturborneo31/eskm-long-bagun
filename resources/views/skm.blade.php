<!doctype html>
<html class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-SKM Kecamatan Long Bagun</title>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=nunito:400,500,600,700,800" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

@php
    use App\Support\Skm;

    $profil = Skm::profil();
    $pasang = fn (array $opsi) => array_combine($opsi, $opsi);

    $unsur = array_values(Skm::unsur());
    $kolomUnsur = array_keys(Skm::unsur());

    $judul = 'max-w-md font-bold tracking-tight mb-2 text-white lg:text-2xl text-4xl drop-shadow-[0_3px_3px_rgba(0,0,0,0.8)]';
    $error = 'error-message max-w-md font-bold tracking-tight mb-2 text-red-800 lg:text-sm text-xl bg-white rounded px-2 py-1';
    $section = 'lg:pt-0 pt-16 items-center relative isolate overflow-y-auto min-w-full h-screen px-6 shadow-2xl sm:px-16 lg:flex lg:px-24 bg-[#137A5E]';
    $latar = 'background-color: #137A5E; background-image: radial-gradient(at -30% -30%, #137A5E, transparent 80%), radial-gradient(at 130% 150%, #137A5E, transparent 80%);';
@endphp

<style>
    body {
        font-family: "Nunito", ui-sans-serif, system-ui, sans-serif;
    }

    .error-message:empty {
        display: none;
    }

    form input[type="radio"].peer+label {
        background-color: #fff;
        border-color: #fff;
        color: #137A5E;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.25);
        transition: background-color .15s, color .15s;
    }

    form input[type="radio"].peer:not(:checked)+label:hover {
        background-color: #E7F3EF;
    }

    form input[type="radio"].peer:checked+label {
        background-color: #064E3B;
        border-color: #fff;
        color: #fff;
    }

    .nav-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 0.75rem;
        border: 2px solid #fff;
        border-radius: 0.5rem;
        background-color: #fff;
        color: #137A5E;
        font-weight: 600;
        cursor: pointer;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.25);
        transition: background-color .15s;
    }

    .nav-btn:hover {
        background-color: #E7F3EF;
    }

    .nav-btn svg {
        width: 2rem;
        height: 2rem;
    }
</style>

<body class="items-center">

    <div class="overflow-x-hidden">

        <div id="popup" class="fixed z-50 bg-black bg-opacity-30 w-full flex items-center h-full">
            <div class="fixed z-30 bg-opacity-50 overflow-y-auto w-full" id="modal">
                <div class="relative mx-auto p-5 border lg:w-1/2 w-5/6 shadow-lg rounded-md bg-white">
                    <div class="mt-3 text-center">
                        <h3 class="text-4xl lg:text-2xl lg:leading-6 font-bold mb-4 text-gray-900">
                            SELAMAT DATANG DI SURVEY KEPUASAN MASYARAKAT
                        </h3>
                        <label class="text-black font-black lg:text-sm text-4xl">PERHATIAN :</label>
                        <div class="px-7 items-start mt-4 text-left justify-start">
                            <table class="border-separate border-spacing-y-3 lg:text-sm text-4xl">
                                <tr>
                                    <td class="items-start flex">1. </td>
                                    <td class="text-justify">Tujuan survei ini adalah untuk memperoleh gambaran secara
                                        obyektif mengenai kepuasan masyarakat terhadap pelayanan publik</td>
                                </tr>
                                <tr>
                                    <td class="items-start flex">2. </td>
                                    <td class="text-justify">Pilihan jawaban yang Anda berikan diharapkan sebagai
                                        pilihan yang dapat dipertanggungjawabkan</td>
                                </tr>
                                <tr>
                                    <td class="items-start flex">3. </td>
                                    <td class="text-justify">Hasil survei ini akan digunakan untuk bahan penyusunan
                                        Laporan Survei Kepuasan Masyarakat terhadap pelayanan publik yang sangat
                                        bermanfaat bagi pemerintah maupun masyarakat</td>
                                </tr>
                                <tr>
                                    <td class="items-start flex">4. </td>
                                    <td class="text-justify">Survei ini tidak meminta data pribadi (nama, NIK, alamat
                                        maupun nomor HP)</td>
                                </tr>
                            </table>
                        </div>
                        <div class="items-center px-4 py-3">
                            <button onclick="closePopup()" id="ok-btn"
                                class="w-full px-4 py-2 font-bold text-4xl lg:text-xl text-white bg-[#137A5E] rounded-lg shadow-sm hover:bg-[#064E3B] focus:outline-none focus:ring-2 focus:ring-[#137A5E]/40">
                                OK
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <form action="{{ route('nilaiUnsur.store') }}" method="POST" class="h-screen flex" id="form-skm">
            @csrf

            {{-- Halaman 1: pilih jenis layanan saja --}}
            <div id="layanan" class="{{ $section }}" style="{{ $latar }}">
                <div class="lg:py-8 lg:text-left w-full max-w-3xl mx-auto">
                    @if ($errors->any())
                        <div class="{{ $error }} mb-4">Mohon lengkapi semua pertanyaan yang wajib diisi.</div>
                    @endif

                    <div class="flex justify-between gap-4">
                        <h1 class="{{ $judul }}">Jenis layanan yang akan Anda nilai</h1>
                        <h1 class="{{ $error }}" data-error="jenisPelayanan">@error('jenisPelayanan') Harus Diisi @enderror</h1>
                    </div>
                    @if (count($profil['jenisPelayanan']['opsi']))
                        @include('partials.skm_opsi', [
                            'name' => 'jenisPelayanan',
                            'opsi' => $pasang(array_keys($profil['jenisPelayanan']['opsi'])),
                            'kolom' => 'grid-cols-1',
                        ])
                    @else
                        <p class="text-white lg:text-base text-3xl">Belum ada jenis layanan. Hubungi admin.</p>
                    @endif

                    <div class="flex justify-end mt-8">
                        <a class="nav-btn" onclick="lanjut('layanan', 'identitas')">
                            <span class="text-4xl lg:text-xl">LANJUT</span>
                            @include('partials.skm_panah', ['arah' => 'kanan'])
                        </a>
                    </div>
                </div>
            </div>

            {{-- Halaman 2: A. IDENTITAS RESPONDEN (tanggal layanan diisi otomatis saat survei dikirim) --}}
            <div id="identitas" class="{{ $section }}" style="{{ $latar }}">
                <div class="lg:py-8 lg:text-left w-full max-w-3xl mx-auto">
                    <p class="text-white/80 font-bold lg:text-base text-3xl mb-4">A. IDENTITAS RESPONDEN</p>

                    <div class="flex justify-between">
                        <h1 class="{{ $judul }}">Jenis Kelamin</h1>
                        <h1 class="{{ $error }}" data-error="jenkel">@error('jenkel') Harus Diisi @enderror</h1>
                    </div>
                    @include('partials.skm_opsi', [
                        'name' => 'jenkel',
                        'opsi' => $pasang(Skm::opsi('jenkel')),
                        'kolom' => 'grid-cols-2',
                    ])

                    <div class="flex justify-between mt-8">
                        <a class="nav-btn" onclick="kembali('layanan')">
                            @include('partials.skm_panah', ['arah' => 'kiri'])
                            <span class="text-4xl lg:text-xl">KEMBALI</span>
                        </a>
                        <a class="nav-btn" onclick="lanjut('identitas', 'pendidikan-usia')">
                            <span class="text-4xl lg:text-xl">LANJUT</span>
                            @include('partials.skm_panah', ['arah' => 'kanan'])
                        </a>
                    </div>
                </div>
            </div>

            {{-- Pendidikan dan usia --}}
            <div id="pendidikan-usia" class="{{ $section }}" style="{{ $latar }}">
                <div class="lg:flex lg:py-8 lg:text-left w-full justify-between gap-10">
                    <div class="w-full">
                        <div class="flex justify-between">
                            <h1 class="{{ $judul }}">Pendidikan</h1>
                            <h1 class="{{ $error }}" data-error="pendidikan">@error('pendidikan') Harus Diisi @enderror</h1>
                        </div>
                        @include('partials.skm_opsi', [
                            'name' => 'pendidikan',
                            'opsi' => $pasang(Skm::opsi('pendidikan')),
                            'kolom' => 'grid-cols-2',
                        ])
                    </div>
                    <div class="w-full lg:mt-0 mt-8">
                        <div class="flex justify-between">
                            <h1 class="{{ $judul }}">Usia</h1>
                            <h1 class="{{ $error }}" data-error="usia">@error('usia') Harus Diisi @enderror</h1>
                        </div>
                        @include('partials.skm_opsi', [
                            'name' => 'usia',
                            'opsi' => $pasang(Skm::opsi('usia')),
                            'kolom' => 'grid-cols-2',
                        ])

                        <div class="flex justify-between mt-8">
                            <a class="nav-btn" onclick="kembali('identitas')">
                                @include('partials.skm_panah', ['arah' => 'kiri'])
                                <span class="text-4xl lg:text-xl">KEMBALI</span>
                            </a>
                            <a class="nav-btn" onclick="lanjut('pendidikan-usia', 'pekerjaan')">
                                <span class="text-4xl lg:text-xl">LANJUT</span>
                                @include('partials.skm_panah', ['arah' => 'kanan'])
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Pekerjaan --}}
            <div id="pekerjaan" class="{{ $section }}" style="{{ $latar }}">
                <div class="lg:py-8 lg:text-left w-full">
                    <div class="flex justify-between">
                        <h1 class="{{ $judul }}">Pekerjaan</h1>
                        <h1 class="{{ $error }}" data-error="pekerjaan">@error('pekerjaan') Harus Diisi @enderror</h1>
                    </div>
                    @include('partials.skm_opsi', [
                        'name' => 'pekerjaan',
                        'opsi' => $pasang(Skm::opsi('pekerjaan')),
                        'kolom' => 'grid-cols-1 lg:grid-cols-3',
                    ])

                    <div class="flex justify-between mt-8">
                        <a class="nav-btn" onclick="kembali('pendidikan-usia')">
                            @include('partials.skm_panah', ['arah' => 'kiri'])
                            <span class="text-4xl lg:text-xl">KEMBALI</span>
                        </a>
                        <a class="nav-btn" onclick="lanjut('pekerjaan', 'disabilitas')">
                            <span class="text-4xl lg:text-xl">LANJUT</span>
                            @include('partials.skm_panah', ['arah' => 'kanan'])
                        </a>
                    </div>
                </div>
            </div>

            {{-- Disabilitas --}}
            <div id="disabilitas" class="{{ $section }}" style="{{ $latar }}">
                {{-- Tombol navigasi disembunyikan sampai Ya/Tidak dipilih; posisinya dipindah oleh JS:
                     di bawah Ya/Tidak bila "Tidak", di bawah jenis disabilitas bila "Ya". --}}
                <div class="lg:py-8 lg:text-left w-full max-w-3xl mx-auto">
                    <div class="flex justify-between gap-4">
                        <h1 class="{{ $judul }}">Apakah Anda merupakan penyandang disabilitas / pendamping
                            penyandang disabilitas?</h1>
                        <h1 class="{{ $error }}" data-error="disabilitas">@error('disabilitas') Harus Diisi @enderror</h1>
                    </div>
                    @include('partials.skm_opsi', [
                        'name' => 'disabilitas',
                        'opsi' => $pasang(Skm::opsi('disabilitas')),
                        'kolom' => 'grid-cols-2',
                    ])
                    <div id="tempat-nav-tidak"></div>

                    <div id="blok-jenis-disabilitas" class="mt-8 hidden">
                        <div class="flex justify-between gap-4">
                            <h1 class="{{ $judul }}">Jenis disabilitas apa yang Anda miliki / dampingi?</h1>
                            <h1 class="{{ $error }}" data-error="jenis_disabilitas">@error('jenis_disabilitas') Harus Diisi @enderror</h1>
                        </div>
                        @include('partials.skm_opsi', [
                            'name' => 'jenis_disabilitas',
                            'opsi' => $pasang(Skm::opsi('jenis_disabilitas')),
                            'kolom' => 'grid-cols-1',
                        ])
                        <div id="tempat-nav-ya"></div>
                    </div>

                    <div id="nav-disabilitas" class="flex justify-between mt-8 hidden">
                        <a class="nav-btn" onclick="kembali('pekerjaan')">
                            @include('partials.skm_panah', ['arah' => 'kiri'])
                            <span class="text-4xl lg:text-xl">KEMBALI</span>
                        </a>
                        <a class="nav-btn" onclick="lanjut('disabilitas', 'pertanyaan-1')">
                            <span class="text-4xl lg:text-xl">LANJUT</span>
                            @include('partials.skm_panah', ['arah' => 'kanan'])
                        </a>
                    </div>
                </div>
            </div>

            {{-- B. PENDAPAT RESPONDEN TENTANG PELAYANAN: 12 pertanyaan --}}
            @foreach ($unsur as $i => $u)
                @php
                    $nomor = $i + 1;
                    $kolom = $kolomUnsur[$i];
                    $sebelum = $i === 0 ? 'disabilitas' : 'pertanyaan-' . $i;
                    $sesudah = $nomor === count($unsur) ? 'saran' : 'pertanyaan-' . ($nomor + 1);
                @endphp
                <div id="pertanyaan-{{ $nomor }}" class="{{ $section }}" style="{{ $latar }}">
                    <div class="lg:flex lg:py-8 lg:text-left items-center w-full justify-between gap-10">
                        <div class="lg:max-w-md">
                            <p class="text-white/80 font-bold lg:text-base text-3xl mb-4">B. PENDAPAT RESPONDEN
                                TENTANG PELAYANAN ({{ $nomor }}/{{ count($unsur) }})</p>
                            <h2
                                class="text-left font-bold tracking-tight text-white mb-10 text-5xl lg:text-3xl drop-shadow-[0_3px_3px_rgba(0,0,0,0.8)]">
                                {{ $u['kode'] }}. {{ $u['pertanyaan'] }}
                            </h2>
                        </div>
                        <div class="w-full">
                            <h1 class="{{ $error }}" data-error="{{ $kolom }}">@error($kolom) Harus Diisi @enderror</h1>
                            @include('partials.skm_opsi', [
                                'name' => $kolom,
                                'opsi' => Skm::JAWABAN,
                                'kolom' => 'grid-cols-1',
                                'default' => max(array_keys(Skm::JAWABAN)),
                            ])
                            <div class="flex justify-between mt-5">
                                <a class="nav-btn" onclick="kembali('{{ $sebelum }}')">
                                    @include('partials.skm_panah', ['arah' => 'kiri'])
                                    <span class="text-4xl lg:text-xl">KEMBALI</span>
                                </a>
                                <a class="nav-btn" onclick="lanjut('pertanyaan-{{ $nomor }}', '{{ $sesudah }}')">
                                    <span class="text-4xl lg:text-xl">LANJUT</span>
                                    @include('partials.skm_panah', ['arah' => 'kanan'])
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- Saran --}}
            <div id="saran" class="{{ $section }}" style="{{ $latar }}">
                <div class="lg:py-32 lg:text-left items-center w-full">
                    <h2
                        class="text-left font-bold tracking-tight text-white text-5xl lg:text-3xl mb-6 drop-shadow-[0_3px_3px_rgba(0,0,0,0.8)]">
                        Saran perbaikan, masukan dan harapan (tidak wajib) :</h2>
                    <textarea id="saran-input" name="saran" rows="4"
                        class="block w-full p-3 lg:text-xl text-4xl text-black border-2 border-white rounded-lg bg-white mb-6">{{ old('saran') }}</textarea>
                    <button type="submit"
                        class="w-full p-5 mb-8 font-bold text-4xl lg:text-xl text-white bg-[#064E3B] border-2 border-white rounded-lg cursor-pointer shadow-[0_4px_10px_rgba(0,0,0,0.25)] hover:bg-[#053B2D]">
                        KIRIM
                    </button>
                    <a class="nav-btn" onclick="kembali('pertanyaan-{{ count($unsur) }}')">
                        @include('partials.skm_panah', ['arah' => 'kiri'])
                        <span class="text-4xl lg:text-xl">KEMBALI</span>
                    </a>
                </div>
            </div>
        </form>
    </div>

    <script>
        const form = document.getElementById('form-skm');

        function pesan(nama, teks) {
            const el = document.querySelector('[data-error="' + nama + '"]');
            if (el) el.innerText = teks;
        }

        // Semua grup radio dan input tanggal di dalam satu bagian wajib diisi,
        // kecuali jenis disabilitas yang hanya wajib bila menjawab "Ya".
        function bagianValid(id) {
            const bagian = document.getElementById(id);
            let valid = true;

            const grup = new Set([...bagian.querySelectorAll('input[type="radio"]')].map(r => r.name));
            grup.forEach(nama => {
                if (nama === 'jenis_disabilitas' && !(form.disabilitas && form.disabilitas.value === 'Ya')) {
                    pesan(nama, '');
                    return;
                }
                const terpilih = bagian.querySelector('input[name="' + nama + '"]:checked');
                pesan(nama, terpilih ? '' : 'Harus Diisi');
                valid = valid && !!terpilih;
            });

            bagian.querySelectorAll('input[type="date"]').forEach(input => {
                pesan(input.name, input.value ? '' : 'Harus Diisi');
                valid = valid && !!input.value;
            });

            return valid;
        }

        function lanjut(dari, ke) {
            if (bagianValid(dari)) window.location = '#' + ke;
        }

        function kembali(ke) {
            window.location = '#' + ke;
        }

        // Tombol halaman disabilitas: tersembunyi sebelum memilih, lalu tampil di bawah pilihan terakhir.
        function aturDisabilitas(nilai) {
            const nav = document.getElementById('nav-disabilitas');
            const ya = nilai === 'Ya';
            document.getElementById('blok-jenis-disabilitas').classList.toggle('hidden', !ya);
            if (!ya) form.querySelectorAll('input[name="jenis_disabilitas"]').forEach(r => r.checked = false);
            if (!nilai) {
                nav.classList.add('hidden');
                return;
            }
            document.getElementById(ya ? 'tempat-nav-ya' : 'tempat-nav-tidak').appendChild(nav);
            nav.classList.remove('hidden');
        }

        form.addEventListener('change', e => {
            if (e.target.name === 'disabilitas') aturDisabilitas(e.target.value);
        });
        aturDisabilitas(form.disabilitas.value);

        form.addEventListener('submit', e => {
            const bagian = ['layanan', 'identitas', 'pendidikan-usia', 'pekerjaan', 'disabilitas'];
            for (let i = 1; i <= {{ count($unsur) }}; i++) bagian.push('pertanyaan-' + i);
            const salah = bagian.find(id => !bagianValid(id));
            if (salah) {
                e.preventDefault();
                window.location = '#' + salah;
            }
        });

        @if ($errors->any())
            window.location = '#layanan';
        @endif

        var popup = document.getElementById("popup");

        function closePopup() {
            popup.classList.add('hidden');
        }

        @if ($errors->any())
            closePopup();
        @endif
    </script>
</body>

</html>
