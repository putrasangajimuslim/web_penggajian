<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::with('jabatan')->get();
        return view('admin.users.index', ['users' => $users]);
    }

    public function create() {
        $jabatans = Jabatan::get();
        return view('admin.users.create', ['jabatans' => $jabatans]);
    }

    public function store(Request $request) {
        $validateData = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'tgl_lahir' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'role' => 'required',
            'kode_jabatan' => 'required',
            'password' => 'required',
       ]);

       $checkNewUsers = User::where('nama', $request->nama)
                                ->where('email', $request->email)
                                ->where('tgl_lahir', $request->tgl_lahir)
                                ->first();

       if (!empty($checkNewUsers)) {
         return redirect()->back()->with('error', 'Maaf User Baru Tersebut sudah ada');
       }

       $countUsers = User::count();
       
       $currentYear = date('Y');
       
       $kodeKaryawan = $currentYear . $countUsers + 1;

       list($tahun, $bulan, $tanggal) = explode("-", $request->tgl_lahir);
        $kodeKaryawan .= substr($tahun, -2);
        $kodeKaryawan .= $bulan;
        $kodeKaryawan .= $tanggal;

       $users = new User();
        $users->kode_karyawan = $kodeKaryawan;
        $users->nama = $request->nama;
        $users->email = $request->email;
        $users->password = bcrypt($request->password);
        $users->tgl_lahir = $request->tgl_lahir;
        $users->status = $request->status;
        $users->no_hp = $request->no_hp;
        $users->alamat = $request->alamat;
        $users->jenis_kelamin = $request->jenis_kelamin;
        $users->role = $request->role;
        $users->id_jabatan = $request->kode_jabatan;
        $users->status = 1;
        $users->save();

        return redirect()->back()->with('message', 'Berhasil Tambah Users');
    }

    public function edit($id) {
        $jabatans = Jabatan::get();
        $user = User::where('id', $id)->first();
        return view('admin.users.edit', ['user' => $user, 'jabatans' => $jabatans]);
    }

    public function update(Request $request) {
        $validateData = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'tgl_lahir' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'role' => 'required',
            'kode_jabatan' => 'required',
            'status' => 'required',
       ]);

       $id = $request->id_users;
       $nama = $request->nama;
       $email = $request->email;
       $tglLahir = $request->tgl_lahir;
       $noHp = $request->no_hp;
       $alamat = $request->alamat;
       $gender = $request->alamat;
       $password = $request->password;
       $role = $request->role;
       $kodeJ = $request->kode_jabatan;
       $status = $request->status;

       $absen = User::where('id', $id)->first();
       $absen->nama = $nama;
       $absen->email = $email;
       $absen->tgl_lahir = $tglLahir;
       $absen->no_hp = $noHp;
       $absen->alamat = $alamat;
       $absen->jenis_kelamin = $gender;
       $absen->password = !empty($password) ? bcrypt($password) : '';
       $absen->role = $role;
       $absen->id_jabatan = $kodeJ;
       $absen->status = $status;
       $absen->save();

       return redirect()->route('users.index')->with('message', 'Berhasil Update User ' . $nama);
    }

    public function activation_account($id) {
        $user = User::where('id', $id)->first();
        $user->status = 1;
        $user->save();

        return redirect()->back()->with('message', 'Berhasil Aktivasi Users');
    }

    public function destroy($id) {
        User::find($id)->delete();

        return redirect()->route('users.index')->with('message', 'Berhasil Delete Users');
    }
}
