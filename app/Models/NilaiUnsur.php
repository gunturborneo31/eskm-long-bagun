<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiUnsur extends Model
{

    use HasFactory;
    public $table = "2024";

    protected $fillable = [
            'jenisPelayanan',
            'tanggal_layanan',
            'jenkel',
            'pendidikan',
            'usia',
            'pekerjaan',
            'disabilitas',
            'jenis_disabilitas',
            'u1',
            'u2',
            'u3',
            'u4',
            'u5',
            'u6',
            'u7',
            'u8',
            'u9',
            'u10',
            'u11',
            'u12',
            'saran',
    ];
}
