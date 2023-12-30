<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'kode_karyawan' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        $infoLogin = $request->only('kode_karyawan', 'password', 'role');

        if (Auth::guard('karyawan')->attempt($infoLogin)) {
            $user = Auth::guard('karyawan')->user();

            if ($user->status == 1) {
                return redirect()->route('dashboard')->with('message', 'Success Login');
            } else {
                Auth::guard('karyawan')->logout();
                return redirect()->back()->with('error', 'Silahkan Aktivasi Akun tersebut.');
            }
        } else {
            return redirect()->back()->with('error', 'Username and password or role do not match');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
