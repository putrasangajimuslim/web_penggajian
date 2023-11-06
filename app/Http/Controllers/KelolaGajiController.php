<?php

namespace App\Http\Controllers;

use App\Models\Kelola;
use Illuminate\Http\Request;

class KelolaGajiController extends Controller
{
    public function index() {
        $kelolagajis = Kelola::get();
        return view('admin.kelolagaji.index', ['kelolagajis' => $kelolagajis]);
    }

    public function edit($id) {
        $kelolagaji = Kelola::where('id', $id)->first();

        return view('admin.kelolagaji.edit', ['kelolagaji' => $kelolagaji]);
    }

    public function update(Request $request) {
        $kelolagaji = Kelola::where('id', $request->id_kelola)->first();
        $accumulationGajiBersih = $kelolagaji->gaji_pokok + $kelolagaji->tunjangan_transport + $kelolagaji->uang_makan + $request->bonus - $kelolagaji->potongan;

        $kelolagaji->bonus = $request->bonus;
        $kelolagaji->gaji_bersih = $accumulationGajiBersih;
        $kelolagaji->save();

        return redirect()->route('kelolagaji.index')->with('message', 'Berhasil Update Kelola Gaji');
    }

    public function destroy($id) {
        Kelola::find($id)->delete();

        return redirect()->route('kelolagaji.index')->with('message', 'Berhasil Delete Kelola Gaji');
    }
}
