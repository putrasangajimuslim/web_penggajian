<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelola extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'kelola';

    protected $fillable = [
        'kode_karyawan',
        'bulan',
        'tahun',
        'jml_kehadiran',
        'jml_alfa',
        'gaji_pokok',
        'bonus',
        'tunjangan_transport',
        'potongan',
        'gaji_bersih',
    ];
}
