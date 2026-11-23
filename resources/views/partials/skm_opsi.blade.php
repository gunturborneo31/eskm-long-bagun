{{--
    Pilihan radio kuesioner.
    Parameter: $name, $opsi (value => label), $kolom (kelas grid), $default (value yang terpilih di awal, opsional)
--}}
@php $terpilih = (string) old($name, $default ?? ''); @endphp
<p class="text-white/80 italic lg:text-sm text-2xl mb-2">Pilih salah satu</p>
<ul class="grid w-full gap-2 {{ $kolom ?? 'grid-cols-1' }}">
    @foreach ($opsi as $value => $label)
        @php $id = $name . '_' . $loop->index; @endphp
        <li>
            <input type="radio" id="{{ $id }}" name="{{ $name }}" value="{{ $value }}"
                {{ $terpilih === (string) $value ? 'checked' : '' }} class="hidden peer">
            <label for="{{ $id }}"
                class="inline-flex items-center justify-between w-full p-3 border-2 rounded-lg cursor-pointer">
                <span class="w-full text-left text-4xl lg:text-xl font-semibold">{{ $label }}</span>
            </label>
        </li>
    @endforeach
</ul>
