<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Karyawan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'karyawan';

    protected $fillable = [
        'kode_karyawan',
        'nama',
        'tgl_lahir',
        'status',
        'no_hp',
        'alamat',
        'jenis_kelamin',
        'password',
        'role',
        'id_jabatan',
    ];
}
