@extends('layouts.index', ['title' => 'Pengaturan'])

@php
    $input = 'border border-gray-300 rounded-lg px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#137A5E]/30';
    $tombol = 'rounded-full font-bold text-sm px-4 py-1.5 text-white transition';
    $th = 'px-3 py-2 text-left text-xs font-semibold text-white uppercase';
@endphp

@section('content')
    <div class="absolute top-0 left-[215px] right-2 bottom-2 p-2">
        <div class="bg-white h-full w-full rounded-xl p-4 shadow-sm border border-slate-200 flex flex-col overflow-y-auto">
            <p class="text-[22px] lg:text-[28px] font-black text-[#137A5E] leading-tight">PENGATURAN</p>
            <p class="text-sm text-slate-600 mb-4">Daftar pilihan <b>Jenis Layanan</b> yang muncul di form survei.
                Layanan yang dinonaktifkan tidak tampil di form, tetapi tetap muncul di rekap data lama.</p>

            @if (session('pesan'))
                <div class="mb-3 rounded-lg bg-emerald-50 border border-emerald-300 text-emerald-800 text-sm px-3 py-2">
                    {{ session('pesan') }}</div>
            @endif
            @if ($errors->any())
                <div class="mb-3 rounded-lg bg-red-50 border border-red-300 text-red-800 text-sm px-3 py-2">
                    {{ $errors->first() }}</div>
            @endif

            <form method="POST" action="{{ route('pengaturanAdmin.store') }}"
                class="flex flex-wrap items-end gap-2 mb-4 rounded-xl border border-[#137A5E] bg-slate-50 p-3">
                @csrf
                <div class="flex flex-col flex-1 min-w-[240px]">
                    <label class="text-xs font-bold text-[#137A5E] mb-1">Jenis layanan baru</label>
                    <input type="text" name="nama" value="{{ old('nama') }}" required class="{{ $input }}"
                        placeholder="Contoh: Surat Keterangan Tidak Mampu">
                </div>
                <div class="flex flex-col w-24">
                    <label class="text-xs font-bold text-[#137A5E] mb-1">Urutan</label>
                    <input type="number" name="urutan" min="0" class="{{ $input }}">
                </div>
                <button type="submit" class="{{ $tombol }} bg-[#137A5E] hover:bg-[#0E6048]">Tambah</button>
            </form>

            <div class="rounded-xl border border-[#137A5E] overflow-hidden">
                <table class="w-full border-collapse">
                    <thead class="bg-[#137A5E]">
                        <tr>
                            <th class="{{ $th }} w-20">Urutan</th>
                            <th class="{{ $th }}">Nama Jenis Layanan</th>
                            <th class="{{ $th }} w-24">Aktif</th>
                            <th class="{{ $th }} w-48">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($layanan as $item)
                            <tr class="{{ $loop->even ? 'bg-slate-50' : 'bg-white' }} border-t border-slate-200">
                                <td colspan="4" class="p-0">
                                    <form method="POST" action="{{ route('pengaturanAdmin.update', $item->id) }}"
                                        class="flex items-center">
                                        @csrf
                                        @method('PUT')
                                        <div class="px-3 py-2 w-20">
                                            <input type="number" name="urutan" min="0" value="{{ $item->urutan }}"
                                                class="{{ $input }} w-16">
                                        </div>
                                        <div class="px-3 py-2 flex-1">
                                            <input type="text" name="nama" value="{{ $item->nama }}" required
                                                class="{{ $input }} w-full">
                                        </div>
                                        <div class="px-3 py-2 w-24">
                                            <input type="checkbox" name="aktif" value="1" {{ $item->aktif ? 'checked' : '' }}
                                                class="w-4 h-4 accent-[#137A5E]">
                                        </div>
                                        <div class="px-3 py-2 w-48 flex gap-2">
                                            <button type="submit" class="{{ $tombol }} bg-[#137A5E] hover:bg-[#0E6048]">Simpan</button>
                                            <button type="submit" form="hapus-{{ $item->id }}"
                                                class="{{ $tombol }} bg-red-600 hover:bg-red-700">Hapus</button>
                                        </div>
                                    </form>
                                    <form id="hapus-{{ $item->id }}" method="POST"
                                        action="{{ route('pengaturanAdmin.destroy', $item->id) }}"
                                        onsubmit="return confirm('Hapus jenis layanan ini?');">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-3 py-4 text-center text-sm text-slate-500">Belum ada jenis layanan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
