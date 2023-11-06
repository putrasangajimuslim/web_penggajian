<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $this->validate($request,[
            'kode_karyawan' => 'required',
            'password' => 'required',
            'role' => 'required',
       ] );
    
        $infoLogin = $request->only('kode_karyawan', 'password', 'role');
    
        if (Auth::attempt($infoLogin)) {
            // Authentication passed, redirect to the desired page
            // Cek status pengguna setelah otentikasi
            $user = Auth::user();
            if ($user->status == 1) {
                return redirect()->route('dashboard')->with('message', 'Success Login');
            } else {
                // Jika status pengguna tidak sama dengan 1, logout dan kembalikan pesan kesalahan
                Auth::logout();
                return redirect()->back()->with('error', 'Silahkan Aktivasi Akun tersebut.');
            }
        } else {
            // Authentication failed, redirect back with an error message
            return redirect()->back()->with('error', 'Username and password or role do not match');
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
