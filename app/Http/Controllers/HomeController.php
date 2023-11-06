<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {

        $user = Auth::user();

        $isAdminAccess = false;

        if ($user->role == 'admin') {
            $isAdminAccess = true;

            $jmlHadir = Absensi::where('keterangan', '=', 'hadir')->count();
            $jmlkaryawan = User::where('role', '!=', 'admin')->count();
        } else {
            $kodeKaryawan = $user->kode_karyawan;
            $jmlHadir = Absensi::where('kode_karyawan', $kodeKaryawan)->where('keterangan', '=', 'hadir')->count();
            $jmlkaryawan = User::where('role', '!=', 'admin')->count();
        }

        return view('admin.dashboard', ['jmlHadir' => $jmlHadir, 'jmlkaryawan' => $jmlkaryawan, 'isAdminAccess' => $isAdminAccess]);
    }
}
