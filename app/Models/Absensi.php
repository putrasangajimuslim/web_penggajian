<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Absensi extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'absen';

    protected $fillable = [
        'kode_karyawan',
        'jam_masuk',
        'jam_keluar',
        'keterangan',
    ];
}
