<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;
use App\Models\NilaiUnsur;
use App\Support\Skm;


class RekapTotalController extends Controller
{
    public function index(Request $request)
    {
        $selects = Skm::query($request)
            ->orderByDesc('created_at')
            ->paginate(10)
            ->appends($request->query());

        return view('RekapTotal.index', compact('selects'));
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
        // echo ("request");
        // return $request;

        $data = new NilaiUnsur();
        // $data->nm_kelas = $request->nm_kelas;
        // $data->ket = $request->ket;
        // $data->save();
        // return redirect()->back();

        $store = NilaiUnsur::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'pekerjaan' => $request->pekerjaan,
            'jenkel' => $request->jenkel,
            'usia' => $request->usia,
            'nohp' => $request->nohp,
            'pendidikan' => $request->pendidikan,
            'nik' => $request->nik,
            'u1' => $request->persyaratan,
            'u2' => $request->kompetensi,
            'u3' => $request->prosedur,
            'u4' => $request->perilaku,
            'u5' => $request->kecepatan,
            'u6' => $request->sarana,
            'u7' => $request->biaya,
            'u8' => $request->penanganan,
            'u9' => $request->kesesuaian,
            'saran' => $request->saran,
        ]);

        if ($store) {
            //redirect dengan pesan sukses
            return redirect('/');
        } else {
        //     //redirect dengan pesan error
            return redirect('/');
        }
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
    public function destroy(Request $request, String $id)
    {
        // hapus dari tabel tahun yang sedang ditampilkan (2023 / 2024), bukan selalu tabel 2024
        $hapus = DB::table(Skm::tabel(Skm::tahun($request)))->where('id', $id)->delete();
        abort_if($hapus === 0, 404);

        return redirect()->back();
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
