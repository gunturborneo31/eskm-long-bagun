<?php

namespace App\Http\Controllers;

use App\Exports\ExportNilaiUnsur;
use App\Exports\ExportResume;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportResume()
    {
        return Excel::download(new ExportResume, 'Resume e-skm.xlsx');
    }

    public function exportNilaiUnsur()
    {
        return Excel::download(new ExportNilaiUnsur, 'Nilai Unsur e-skm.xlsx');
    }
}
