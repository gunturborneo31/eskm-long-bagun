@php
    $i = '/' . request()->path();

    // periode & filter yang sedang dipilih ikut terbawa saat pindah menu
    $query = \App\Support\Skm::queryString(request()->has('tw') ? request() : request()->duplicate(['tw' => \App\Support\Skm::twSekarang()]));

    $menus = [
        [
            'label' => 'Resume',
            'url' => '/rekapTotal?' . $query,
            'match' => 'rekapTotal',
            'icon' => 'M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
        ],
        [
            'label' => 'Nilai Unsur',
            'url' => '/nilaiUnsur?' . $query,
            'match' => 'nilaiUnsur',
            'icon' => 'M4 6h16M4 10h16M4 14h16M4 18h16',
        ],
        [
            'label' => 'Nilai',
            'url' => '/nilaiRekap?' . $query,
            'match' => 'nilaiRekap',
            'icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z',
        ],
        [
            'label' => 'Dashboard',
            'url' => '/dashboardAdmin/create?' . $query,
            'match' => 'dashboard',
            'icon' => 'M4 5a1 1 0 011-1h4a1 1 0 011 1v5a1 1 0 01-1 1H5a1 1 0 01-1-1V5zm10 0a1 1 0 011-1h4a1 1 0 011 1v2a1 1 0 01-1 1h-4a1 1 0 01-1-1V5zM4 15a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1H5a1 1 0 01-1-1v-4zm10-3a1 1 0 011-1h4a1 1 0 011 1v7a1 1 0 01-1 1h-4a1 1 0 01-1-1v-7z',
        ],
        [
            'label' => 'Pengaturan',
            'url' => '/pengaturanAdmin',
            'match' => 'pengaturan',
            'icon' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065zM15 12a3 3 0 11-6 0 3 3 0 016 0z',
        ],
    ];

    $navBase = 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-semibold tracking-wide transition-colors duration-150';
    $navActive = $navBase . ' bg-white text-[#137A5E] shadow-sm';
    $navIdle = $navBase . ' text-white/90 hover:bg-white/10 hover:text-white';
@endphp

<div class="relative h-screen w-screen bg-[#137A5E]" style="font-family:'Roboto'">
    <aside class="flex h-full w-[215px] flex-col px-4 py-5">

        <div class="flex items-center gap-3 border-b border-white/20 pb-5">
            <img src="/assets/logo_mahulu.png" class="h-12 w-12 shrink-0 rounded-xl bg-white object-contain p-1"
                alt="Lambang Kabupaten Mahakam Ulu">
            <div class="leading-tight text-white">
                <p class="text-2xl font-black tracking-wide">E-SKM</p>
                <p class="text-[11px] font-semibold uppercase tracking-wider text-white/80">Kec. Long Bagun</p>
            </div>
        </div>

        <nav class="mt-5 flex flex-1 flex-col gap-1">
            <p class="mb-1 px-3 text-[10px] font-bold uppercase tracking-widest text-white/60">Menu</p>
            @foreach ($menus as $menu)
                <a href="{{ $menu['url'] }}" class="{{ str_contains($i, $menu['match']) ? $navActive : $navIdle }}">
                    <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="{{ $menu['icon'] }}" />
                    </svg>
                    <span class="uppercase">{{ $menu['label'] }}</span>
                </a>
            @endforeach
        </nav>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="flex w-full items-center gap-3 rounded-lg bg-red-600 px-3 py-2.5 text-sm font-semibold uppercase tracking-wide text-white transition-colors duration-150 hover:bg-red-700">
                <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                Keluar
            </button>
        </form>
    </aside>
</div>
