<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Session;
use App\Models\NilaiUnsur;
use App\Support\Skm;


class NilaiUnsurController extends Controller
{
    public function index(Request $request)
    {
        $query = Skm::query($request);
        $hasil = Skm::hitung($query);
        $selects = (clone $query)->orderBy('created_at')->paginate(10)->appends($request->query());

        return view('NilaiUnsur.index', compact('selects', 'hasil'));
    }


    public function cariNilaiUnsur(Request $request)
    {
        $keyword = $request->search;
        $datas = NilaiUnsur::where('nilaiUnsur', 'like', "%" . 'like', "%" . $keyword . "%");
        return view('nilaiUnsur.index', compact('datas'));
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('Nilai.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        $aturan = [
            'jenisPelayanan' => ['required', Rule::in(Skm::jenisLayanan())],
            'disabilitas' => ['required', Rule::in(Skm::opsi('disabilitas'))],
            'jenis_disabilitas' => ['nullable', 'required_if:disabilitas,Ya', Rule::in(Skm::opsi('jenis_disabilitas'))],
            'saran' => ['nullable', 'string', 'max:2000'],
        ];
        foreach (['jenkel', 'pendidikan', 'usia', 'pekerjaan'] as $field) {
            $aturan[$field] = ['required', Rule::in(Skm::opsi($field))];
        }
        foreach (array_keys(Skm::unsur()) as $u) {
            $aturan[$u] = ['required', 'integer', Rule::in(array_keys(Skm::JAWABAN))];
        }

        $data = $request->validate($aturan);

        // tanggal menerima layanan = tanggal responden mengisi survei
        $data['tanggal_layanan'] = now()->toDateString();

        if ($data['disabilitas'] !== 'Ya') {
            $data['jenis_disabilitas'] = null;
        }

        NilaiUnsur::create($data);

        return redirect('/terimakasih');
    }

    /**
     * edit
     *
     * @param  mixed $NilaiUnsur
     * @return void
     */
    public function edit(request $request)
    {
        // echo ($request->jenis);
        $datas = NilaiUnsur::latest()->when(request()->search, function ($data_dasars) {
            $data_dasars = $data_dasars->where('id', 'like', '%' . request()->id_nilaiUnsur . '%');
        })
            ->where('id', $_GET['id_nilaiUnsur'])
            ->get();

        return view('Nilai.detail', compact('datas'));
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        $NilaiUnsur = NilaiUnsur::findOrFail($id);
        $NilaiUnsur->delete();

        if ($NilaiUnsur) {
            //redirect dengan pesan sukses
            return redirect()->route('NilaiUnsur.index')->with(['pesan' => 'Data Berhasil Dihapus!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('NilaiUnsur.index')->with(['pesan' => 'Data Gagal Dihapus!']);
        }
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $NilaiUnsur
     * @return void
     */
    public function update(Request $request, NilaiUnsur $NilaiUnsur)
    {
        // print_r($request->post());
        $NilaiUnsur->update([
            'nm_nilaiUnsur' => $request->nm_nilaiUnsur,
            'ket' => $request->ket,
        ]);

        return redirect()->route('NilaiUnsur.index');
    }
}
