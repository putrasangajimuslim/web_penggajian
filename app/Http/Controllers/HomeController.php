<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {

        $user = Auth::guard('karyawan')->user();

        $jmlHadir = Absensi::where('keterangan', '=', 'hadir');
        $jmlkaryawan = Karyawan::where('role', '!=', 'admin');

        $isAdminAccess = false;

        if ($user->role == 'admin') {
            $isAdminAccess = true;
        } else {
            $kodeKaryawan = $user->kode_karyawan;

            $jmlHadir = $jmlHadir->where('kode_karyawan', $kodeKaryawan)->where('keterangan', '=', 'hadir');
        }

        $jmlHadir = $jmlHadir->count();
        $jmlkaryawan = $jmlkaryawan->count();

        return view('admin.dashboard', ['jmlHadir' => $jmlHadir, 'jmlkaryawan' => $jmlkaryawan, 'isAdminAccess' => $isAdminAccess]);
    }
}
