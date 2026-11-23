<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;
use App\Models\NilaiUnsur;
use App\Support\Skm;


class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $query = Skm::query($request);
        $hasil = Skm::hitung($query);

        return view('dashboard', compact('query', 'hasil'));
    }

    public function welcome(Request $request)
    {
        if (! $request->has('tw')) {
            return redirect('?tw=' . Skm::twSekarang() . '&Tahun=' . date('Y'));
        }

        return view('welcome');
    }


    /**
     * create
     *
     * @return void
     */
    public function create(Request $request)
    {
        $query = Skm::query($request);
        $hasil = Skm::hitung($query);

        return view('dashboardAdmin', compact('query', 'hasil'));
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        $cocok = hash_equals((string) config('admin.username'), (string) $request->input('username'))
            && hash_equals((string) config('admin.password'), (string) $request->input('password'));

        if (! $cocok) {
            return redirect('/login')
                ->withInput($request->only('username'))
                ->withErrors(['login' => 'Username atau password salah.']);
        }

        $request->session()->regenerate();
        $request->session()->put('admin_login', true);

        return redirect()->intended('/rekapTotal?tw=' . Skm::twSekarang() . '&Tahun=' . date('Y'));
    }

    public function login(Request $request)
    {
        if ($request->session()->get('admin_login')) {
            return redirect('/rekapTotal?tw=' . Skm::twSekarang() . '&Tahun=' . date('Y'));
        }

        return view('login');
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * edit
     *
     * @param  mixed $Dashboard
     * @return void
     */
    public function edit(request $request)
    {
        // echo ($request->jenis);
        // $datas = Dashboard::latest()->when(request()->search, function ($data_dasars) {
        //     $data_dasars = $data_dasars->where('id', 'like', '%' . request()->id_dashboard . '%');
        // })
        //     ->where('id', $_GET['id_dashboard'])
        //     ->get();

        // return view('Dashboard.detail', compact('datas'));
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        // $Dashboard = Dashboard::findOrFail($id);
        // $Dashboard->delete();

        // if ($Dashboard) {
        //     //redirect dengan pesan sukses
        //     return redirect()->route('Dashboard.index')->with(['pesan' => 'Data Berhasil Dihapus!']);
        // } else {
        //     //redirect dengan pesan error
        //     return redirect()->route('Dashboard.index')->with(['pesan' => 'Data Gagal Dihapus!']);
        // }
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $Dashboard
     * @return void
     */
    // public function update(Request $request, Dashboard $Dashboard)
    // {
    //     // print_r($request->post());
    //     $Dashboard->update([
    //         'nm_dashboard' => $request->nm_dashboard,
    //         'ket' => $request->ket,
    //     ]);

    //     return redirect()->route('Dashboard.index');
    // }
}
