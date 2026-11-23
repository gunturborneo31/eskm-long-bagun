<?php

namespace App\Http\Controllers;

use App\Models\JenisLayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rule;

/** Pengaturan pilihan "Jenis Layanan" pada form survei. */
class PengaturanController extends Controller
{
    public function index()
    {
        $layanan = JenisLayanan::orderBy('urutan')->orderBy('nama')->get();

        return view('Pengaturan.index', compact('layanan'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => ['required', 'string', 'max:255', Rule::unique('jenis_layanan', 'nama')],
            'urutan' => ['nullable', 'integer', 'min:0'],
        ]);
        $data['urutan'] = $data['urutan'] ?? (JenisLayanan::max('urutan') + 1);

        JenisLayanan::create($data + ['aktif' => true]);

        return redirect()->route('pengaturanAdmin.index')->with('pesan', 'Jenis layanan ditambahkan.');
    }

    public function update(Request $request, string $id)
    {
        $layanan = JenisLayanan::findOrFail($id);
        $data = $request->validate([
            'nama' => ['required', 'string', 'max:255', Rule::unique('jenis_layanan', 'nama')->ignore($layanan->id)],
            'urutan' => ['required', 'integer', 'min:0'],
            'aktif' => ['nullable', 'boolean'],
        ]);
        $data['aktif'] = $request->boolean('aktif');

        // Jawaban lama menyimpan nama layanan sebagai teks, jadi ikut diganti bila nama diubah.
        if ($layanan->nama !== $data['nama']) {
            foreach (['2024', '2023'] as $tabel) {
                if (Schema::hasTable($tabel)) {
                    DB::table($tabel)->where('jenisPelayanan', $layanan->nama)->update(['jenisPelayanan' => $data['nama']]);
                }
            }
        }

        $layanan->update($data);

        return redirect()->route('pengaturanAdmin.index')->with('pesan', 'Jenis layanan diperbarui.');
    }

    public function destroy(string $id)
    {
        JenisLayanan::findOrFail($id)->delete();

        return redirect()->route('pengaturanAdmin.index')->with('pesan', 'Jenis layanan dihapus. Jawaban survei yang sudah masuk tidak ikut terhapus.');
    }
}
